<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function show(Request $request)
    {
        // Validate the form input
        $validatedData = $request->validate([
            'password' => 'required',
            'phrase' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::guard('admin')->attempt(['password' => $validatedData['password'], 'pass_phrase' => $validatedData['phrase']])) {
            // Authentication successful
            return view('admin.panel');
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }
}
