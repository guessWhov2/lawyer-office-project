<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller{
    
    
    public function index(Request $request){
        // Retrieve the authenticated user
        $user = Auth::user();

        // Initialize userCases variable
        $userCases = [];

        // Check if the user is authenticated
        if($user){
            // Get the cases associated with the authenticated user
            $legalCases = LegalCase::where('user_id', $user->id)->get();
        }

        // Pass the userCases to the dashboard view
        return view('dashboard', ['legalCases' => $legalCases, 'user' => $user]);
    }
}
