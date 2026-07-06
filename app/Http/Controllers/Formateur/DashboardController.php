<?php

namespace App\Http\Controllers\Formateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** Dashboard formateur — liste des séminaires où l'utilisateur intervient. */
    public function index(Request $request)
    {
        $user = $request->user();

        $seminars = $user->seminarsAsTrainer()
            ->withCount(['participants as participants_count', 'documents as documents_count'])
            ->orderBy('start_date', 'asc')
            ->get();

        return view('formateur.dashboard', compact('seminars'));
    }
}
