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
}
