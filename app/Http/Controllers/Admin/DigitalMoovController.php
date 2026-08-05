<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DigitalMoovContact;
use Illuminate\Http\Request;

class DigitalMoovController extends Controller
{
    public function index(Request $request)
    {
        $query = DigitalMoovContact::orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('subject', 'like', "%{$s}%")
                  ->orWhere('message', 'like', "%{$s}%");
            });
        }

        $contacts = $query->paginate(15)->withQueryString();

        $stats = [
            'total'    => DigitalMoovContact::count(),
            'new'      => DigitalMoovContact::where('status', 'new')->count(),
            'read'     => DigitalMoovContact::where('status', 'read')->count(),
            'replied'  => DigitalMoovContact::where('status', 'replied')->count(),
            'archived' => DigitalMoovContact::where('status', 'archived')->count(),
        ];

        return view('admin.digitalmoov.index', compact('contacts', 'stats'));
    }

    public function updateStatus(Request $request, DigitalMoovContact $contact)
    {
        $request->validate([
            'status'      => 'required|in:new,read,replied,archived',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $contact->update([
            'status'      => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'Le message #' . $contact->id . ' a été mis à jour.');
    }

    public function destroy(DigitalMoovContact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Le message a été supprimé.');
    }
}
