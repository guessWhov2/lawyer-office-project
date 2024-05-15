<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Initialize userCases variable
        $legalCases = [];

        // Check if the user is authenticated
        if ($user) {
            // Get role to display right content
            $userRole = Role::where('id', $user->role_id)->first();

            switch (strtolower($userRole->name)) {
                case 'client':
                    $legalCases = LegalCase::where('user_id', $user->id)->paginate(10);
                    break;
                case 'lawyer':
                    $legalCases = LegalCase::where('lawyer_id', $user->id)->where('status', 'open')->paginate(10);
                    break;
            }
        }


        // Data for view
        return view('dashboard', ['legalCases' => $legalCases, 'user' => $user, 'userRole' => $userRole]);
    }
}
