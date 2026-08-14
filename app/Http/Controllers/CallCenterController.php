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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg,zip|max:10240',
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('callcenter_attachments', 'public');
            $validated['attachment'] = $path;
        }

        \App\Models\CallCenterRequest::create($validated);

        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès avec votre pièce jointe. Notre équipe vous contactera dans les plus brefs délais.');
    }
}
