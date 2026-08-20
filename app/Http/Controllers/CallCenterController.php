<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallCenterController extends Controller
{
    public function index()
    {
        return view('callcenter.index');
    }

    public function about()
    {
        return view('callcenter.about');
    }

    public function services()
    {
        return view('callcenter.services');
    }

    public function energie()
    {
        return view('callcenter.secteurs.energie');
    }

    public function assurance()
    {
        return view('callcenter.secteurs.assurance');
    }

    public function technologie()
    {
        return view('callcenter.secteurs.technologie');
    }

    public function support()
    {
        return view('callcenter.support');
    }

    public function blog()
    {
        return view('callcenter.blog');
    }

    public function contact()
    {
        return view('callcenter.contact');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:50',
            'subject'       => 'required|string|max:255',
            'message'       => 'required|string|max:5000',
            'pays'          => 'nullable|string|max:255',
            'poste'         => 'nullable|string|max:255',
            'entreprise'    => 'nullable|string|max:255',
            'attachment'    => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,png,jpg,jpeg,zip',
                'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/png,image/jpeg,application/zip',
                'max:10240', // 10 MB max
            ],
        ]);

        $extraDetails = [];
        if ($request->filled('entreprise')) {
            $extraDetails[] = "• Entreprise / Institution : " . $request->input('entreprise');
        }
        if ($request->filled('poste')) {
            $extraDetails[] = "• Fonction / Poste : " . $request->input('poste');
        }
        if ($request->filled('pays')) {
            $extraDetails[] = "• Pays : " . $request->input('pays');
        }

        if (!empty($extraDetails)) {
            $validated['message'] = "--- Informations Entreprise ---\n" . implode("\n", $extraDetails) . "\n\n--- Message ---\n" . $validated['message'];
        }

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '_' . \Illuminate\Support\Str::random(12) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('callcenter_attachments', $fileName, 'public');
            $validated['attachment'] = $path;
        }

        unset($validated['pays'], $validated['poste'], $validated['entreprise']);

        \App\Models\CallCenterRequest::create($validated);

        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès. Notre équipe vous contactera dans les plus brefs délais.');
    }
}
