<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CallCenterRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\CallCenterRequest::latest()->paginate(10);
        return view('admin.callcenter.index', compact('requests'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:Nouveau,En cours,Traité']);
        $callRequest = \App\Models\CallCenterRequest::findOrFail($id);
        $callRequest->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }

    public function destroy($id)
    {
        \App\Models\CallCenterRequest::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    }
}
