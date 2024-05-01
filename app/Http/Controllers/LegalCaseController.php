<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LegalCaseController extends Controller
{
    // Add Case
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'case_type_id' => 'required|exists:case_types,id',
            'description' => 'required|string:255',
            'user_id'=> 'required"exists:users,id'
        ]);
        
        // Add the authenticated user's ID to the validated data
        //$validatedData['user_id'] = 
if($validator){
        // Create a new legal case with the validated data
        $legalCase = LegalCase::create(
            ['title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'case_type_id' => $request->input('case_type_id')]);
        
        $message = session('message');
    }
        // Optionally, you can return a response indicating success
        return redirect()->back()->with([
            'message' => 'Legal case created successfully',
            'legalCase' => $legalCase,
        ]);
        
    }

    //Legal case display
    // Show details about case
    public function details(Request $request){

        $caseOwner_id = $request->input('case_user_id');
        
        // Check if the authenticated user is allowed to access the legal case
        if (Auth::check() && Auth::user()->id == $caseOwner_id) {
            $selectedCase = LegalCase::where('user_id', $caseOwner_id)->with('notes')->first();
            
            // Check if the legal case exists
            if ($selectedCase) {
                return view('legalCase.details', ['selectedCase' => $selectedCase]);
            } else {
                // Handle case not found
                return redirect()->back()->with('error', 'Legal case not found.');
            }
        } else {
            // Handle unauthorized access
            return redirect('/')->with('error', 'Unauthorized access.');
        }
    
    }
}
