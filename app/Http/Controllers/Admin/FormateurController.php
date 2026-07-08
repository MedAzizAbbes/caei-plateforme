<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\FormateurCredentialsMail;
use App\Models\Seminar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class FormateurController extends Controller
{
    /** Liste de tous les formateurs. */
    public function index(Request $request)
    {
        $formateurs = User::where('role', 'formateur')
            ->withCount('seminarsAsTrainer')
            ->when($request->filled('q'), function ($query) use ($request) {
                $q = $request->q;
                $query->where(function ($sub) use ($q) {
                    $sub->where('first_name', 'like', "%{$q}%")
                        ->orWhere('last_name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%")
                        ->orWhere('institution', 'like', "%{$q}%");
                });
            })
            ->orderBy('last_name')
            ->paginate(20)
            ->withQueryString();

        return view('admin.formateurs.index', compact('formateurs'));
    }

    /** Formulaire de creation. */
    public function create()
    {
        $seminars = Seminar::orderByDesc('start_date')->get(['id', 'theme', 'country', 'start_date']);

        return view('admin.formateurs.create', compact('seminars'));
    }

    /** Enregistrement d'un nouveau formateur. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => ['required', 'string', 'max:100'],
            'last_name'     => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone'         => ['nullable', 'string', 'max:30'],
            'institution'   => ['nullable', 'string', 'max:255'],
            'password'      => ['required', 'confirmed', Password::min(8)],
            'seminar_ids'   => ['nullable', 'array'],
            'seminar_ids.*' => ['integer', 'exists:seminars,id'],
        ]);

        // Conserver le mot de passe en clair avant hachage pour l'envoyer par mail
        $plainPassword = $data['password'];

        $formateur = User::create([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
            'phone'       => $data['phone'] ?? null,
            'institution' => $data['institution'] ?? null,
            'password'    => Hash::make($plainPassword),
            'role'        => 'formateur',
        ]);

        if (!empty($data['seminar_ids'])) {
            $formateur->seminarsAsTrainer()->sync($data['seminar_ids']);
        }

        // Envoi de l'e-mail avec les identifiants de connexion
        try {
            Mail::to($formateur->email)->send(new FormateurCredentialsMail($formateur, $plainPassword));
        } catch (\Throwable $e) {
            // Ne pas bloquer la creation si l'envoi echoue
            logger()->error('Envoi mail formateur echoue : ' . $e->getMessage());
        }

        return redirect()
            ->route('admin.formateurs.index')
            ->with('success', "Le formateur {$formateur->fullName()} a ete cree avec succes. Un e-mail avec ses identifiants lui a ete envoye.");
    }

    /** Fiche detail d'un formateur. */
    public function show(User $formateur)
    {
        abort_if($formateur->role !== 'formateur', 404);

        $formateur->load('seminarsAsTrainer');

        return view('admin.formateurs.show', compact('formateur'));
    }

    /** Formulaire d'edition. */
    public function edit(User $formateur)
    {
        abort_if($formateur->role !== 'formateur', 404);

        $seminars    = Seminar::orderByDesc('start_date')->get(['id', 'theme', 'country', 'start_date']);
        $assignedIds = $formateur->seminarsAsTrainer()->pluck('seminars.id')->toArray();

        return view('admin.formateurs.edit', compact('formateur', 'seminars', 'assignedIds'));
    }

    /** Mise a jour d'un formateur. */
    public function update(Request $request, User $formateur)
    {
        abort_if($formateur->role !== 'formateur', 404);

        $rules = [
            'first_name'    => ['required', 'string', 'max:100'],
            'last_name'     => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'max:255', "unique:users,email,{$formateur->id}"],
            'phone'         => ['nullable', 'string', 'max:30'],
            'institution'   => ['nullable', 'string', 'max:255'],
            'seminar_ids'   => ['nullable', 'array'],
            'seminar_ids.*' => ['integer', 'exists:seminars,id'],
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Password::min(8)];
        }

        $data = $request->validate($rules);

        $formateur->update([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
            'phone'       => $data['phone'] ?? null,
            'institution' => $data['institution'] ?? null,
        ]);

        if ($request->filled('password')) {
            $formateur->update(['password' => Hash::make($data['password'])]);
        }

        $formateur->seminarsAsTrainer()->sync($data['seminar_ids'] ?? []);

        return redirect()
            ->route('admin.formateurs.index')
            ->with('success', "Le formateur {$formateur->fullName()} a ete mis a jour.");
    }

    /** Suppression d'un formateur. */
    public function destroy(User $formateur)
    {
        abort_if($formateur->role !== 'formateur', 404);

        $name = $formateur->fullName();
        $formateur->seminarsAsTrainer()->detach();
        $formateur->delete();

        return redirect()
            ->route('admin.formateurs.index')
            ->with('success', "Le formateur {$name} a ete supprime.");
    }
}
