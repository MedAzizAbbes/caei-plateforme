<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        if (array_key_exists('name', $validated) && ! empty($validated['name'])) {
            $parts = preg_split('/\s+/', trim((string) $validated['name']), 2) ?: [];
            $validated['first_name'] = $parts[0] ?? $user->first_name;
            $validated['last_name'] = $parts[1] ?? $user->last_name;
        }

        if (! array_key_exists('first_name', $validated) || $validated['first_name'] === null) {
            $validated['first_name'] = $user->first_name;
        }

        if (! array_key_exists('last_name', $validated) || $validated['last_name'] === null) {
            $validated['last_name'] = $user->last_name;
        }

        $user->fill(array_diff_key($validated, ['name' => true]));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
