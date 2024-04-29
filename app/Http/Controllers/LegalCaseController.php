<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;
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
}
