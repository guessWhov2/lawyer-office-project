<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller{
    
    
    public function index(Request $request){Log::info('-------------');
        // Retrieve the authenticated user
        $user = Auth::user();
        Log::info($request);
        
        // Initialize userCases variable
        $legalCases = [];
        
        // Check if the user is authenticated
        if($user){
            // Get the cases associated with the authenticated user
            $legalCases = LegalCase::where('user_id', $user->id)->get();
        }
        // Get role to display right content
        $userRole = Role::where('id', $user->role_id);
        Log::info($userRole);
        // Data for view
        return view('dashboard', ['legalCases' => $legalCases, 'user' => $user, 'userRole' => $userRole]);
    }
}
