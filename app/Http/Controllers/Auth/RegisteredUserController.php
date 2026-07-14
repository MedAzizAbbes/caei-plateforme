<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /** Formulaire de création de compte. */
    public function create(): View
    {
        return view('auth.register');
    }

    /** Crée un compte utilisateur, en mode inscription publique ou en création par admin. */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:255'],
            'pays' => ['nullable', 'string', 'max:255'],
            'poste' => ['nullable', 'string', 'max:255'],
            'institution' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'in:participant,formateur,admin'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        $currentUser = Auth::user();
        $isAdminCreation = Auth::check() && $currentUser && $currentUser->role === 'admin';
        $role = $isAdminCreation ? ($request->input('role') ?? 'formateur') : 'participant';

        $user = User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $request->email,
            'phone' => $request->phone,
            'pays' => $request->pays,
            'poste' => $request->poste,
            'institution' => $request->institution,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        if (! $isAdminCreation) {
            Auth::login($user);
        }

        event(new Registered($user));

        if ($isAdminCreation) {
            return redirect()->route('register')
                ->with('success', "Compte {$role} créé pour {$user->fullName()}.");
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }
}