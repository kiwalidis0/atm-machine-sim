<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages/home');
    }

    public function atm() {
        return view('pages/atm');
    }

    public function about() {
        return view('pages/about');
    }

    public function contact() {
        return view('pages/contact');
    }

    public function sample_form() {
        return view('pages/sample_form');
    }

    public function sample_form_submit(Request $request){

        $fname = $request->input('first_name');
        $lname = $request->input('last_name');

        return response()->json([
            'message' => "Hello $fname $lname, your form was submitted successfully!"
        ]);
    }
}