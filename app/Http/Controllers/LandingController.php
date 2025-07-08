<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LandingController extends Controller
{
    public function show()
    {
        return view('landing');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:leads,email',
        ]);

        Lead::create([
            'email' => $validated['email'],
        ]);

        return redirect()->back()->with('success', 'Thanks for subscribing!');
    }
}
