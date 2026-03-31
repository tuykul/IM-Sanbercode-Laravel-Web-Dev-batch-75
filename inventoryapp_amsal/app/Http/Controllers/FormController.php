<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function welcome(Request $request)
    {
        $fname = $request->input('fullName');
        return view('welcome', ["fname"=> $fname]);
    }
}
