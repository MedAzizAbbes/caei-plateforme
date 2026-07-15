<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ArrangementApprovedMail;
use App\Mail\RegistrationQrCodeMail;
use App\Models\Payment;
use App\Models\QrCode;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ArrangementController extends Controller
{
    /** Liste tous les paiements (virement, visa, arrangement). */
    public function index(Request $request)
    {
        $payments = Payment::with(['user', 'seminar', 'registration'])
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('payment_method'), fn ($q) => $q->where('payment_method', $request->payment_method))
            ->when($request->filled('seminar_id'), fn ($q) => $q->where('seminar_id', $request->seminar_id))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        $seminars = Seminar::orderBy('start_date')->get(['id', 'theme']);

        return view('admin.arrangements.index', compact('payments', 'seminars'));
    }

    /** Valider un paiement → statut paid + documents + emails. */
    public function approve(Request $request, Payment $payment)
    {
        if (! in_array($payment->status, ['pending', 'arrangement_pending', 'unpaid'], true)) {
            return back()->with('error', 'Ce paiement ne peut pas être validé dans son état actuel.');
        }

        $registration = $payment->registration()->with(['qrCode', 'user', 'seminar'])->firstOrFail();

        if (! $registration->qrCode) {
            QrCode::generateFor($registration);
            $registration->load('qrCode');
        }

        $attestationPath = $this->generatePdf('pdf.attestation_paiement', [
            'payment'      => $payment,
            'registration' => $registration,
        ], 'attestation_' . $payment->id . '.pdf');

        $invitationPath = $this->generatePdf('pdf.lettre_invitation', [
            'payment'      => $payment,
            'registration' => $registration,
        ], 'invitation_' . $payment->id . '.pdf');

        $payment->update([
            'status'           => 'paid',
            'paid_at'          => now(),
            'validated_by'     => auth()->id(),
            'validated_at'     => now(),
            'attestation_path' => $attestationPath,
            'invitation_path'  => $invitationPath,
            'admin_note'       => $request->admin_note ?? $payment->admin_note,
        ]);

        $registration->markConfirmed();

        try {
            Mail::to($payment->user->email)
                ->send(new ArrangementApprovedMail($payment, $registration, 'attestation'));

            Mail::to($payment->user->email)
                ->send(new ArrangementApprovedMail($payment, $registration, 'invitation'));

            Mail::to($payment->user->email)
                ->send(new RegistrationQrCodeMail($registration));
        } catch (\Exception $e) {
            logger()->error('Erreur envoi email validation paiement: ' . $e->getMessage());
        }

        return back()->with('success', 'Paiement (' . $payment->methodLabel() . ') validé. Inscription confirmée, documents générés et envoyés par email.');
    }

    /** Refuser un paiement en attente. */
    public function reject(Request $request, Payment $payment)
    {
        $request->validate([
            'admin_note' => 'nullable|string|max:1000',
        ]);

        if (! in_array($payment->status, ['pending', 'arrangement_pending'], true)) {
            return back()->with('error', 'Ce paiement ne peut pas être refusé dans son état actuel.');
        }

        $payment->update([
            'status'            => 'rejected',
            'admin_note'        => $request->admin_note,
            'rejection_reason'  => $request->admin_note,
            'validated_by'      => auth()->id(),
            'validated_at'      => now(),
        ]);

        return back()->with('success', 'Paiement (' . $payment->methodLabel() . ') refusé.');
    }

    /** Ajouter ou modifier la note admin. */
    public function addNote(Request $request, Payment $payment)
    {
        $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $payment->update(['admin_note' => $request->admin_note]);

        return back()->with('success', 'Note ajoutée.');
    }

    /** Télécharger un document généré (attestation ou invitation). */
    public function downloadDocument(Payment $payment, string $type)
    {
        $path = match ($type) {
            'attestation' => $payment->attestation_path,
            'invitation'  => $payment->invitation_path,
            default       => null,
        };

        if (! $path || ! Storage::exists($path)) {
            abort(404, 'Document non disponible.');
        }

        $name = match ($type) {
            'attestation' => 'attestation_paiement_' . $payment->id . '.pdf',
            'invitation'  => 'lettre_invitation_' . $payment->id . '.pdf',
            default       => 'document.pdf',
        };

        return Storage::download($path, $name);
    }

    /** Télécharger le justificatif soumis par le participant. */
    public function downloadJustificatif(Payment $payment)
    {
        if ($payment->payment_method === 'bank_transfer') {
            if (! $payment->transfer_receipt_path || ! Storage::exists($payment->transfer_receipt_path)) {
                abort(404, 'Reçu de virement non disponible.');
            }

            return Storage::download($payment->transfer_receipt_path, 'recu_virement_' . $payment->id);
        }

        if (! $payment->arrangement_document || ! Storage::exists($payment->arrangement_document)) {
            abort(404, 'Document justificatif non disponible.');
        }

        return Storage::download($payment->arrangement_document, 'justificatif_arrangement_' . $payment->id);
    }

    private function generatePdf(string $view, array $data, string $filename): ?string
    {
        $pdfFacade = '\Barryvdh\DomPDF\Facade\Pdf';

        if (! class_exists($pdfFacade)) {
            return null;
        }

        $html = view($view, $data)->render();
        $pdf  = $pdfFacade::loadHTML($html)->setPaper('a4', 'portrait');
        $dir  = 'private/generated_docs';
        $path = $dir . '/' . $filename;

        Storage::makeDirectory($dir);
        Storage::put($path, $pdf->output());

        return $path;
    }
}
