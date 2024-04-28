<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    // Add Case
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'case_type_id' => 'required|exists:case_types,id',
            'description' => 'required|string:255',
        ]);

        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = auth()->id();

        // Create a new legal case with the validated data
        $legalCase = LegalCase::create($validatedData);

        $message = session('message');
        $data = session('data');

        // Optionally, you can return a response indicating success
        return redirect()->back()->with([
            'message' => 'Legal case created successfully',
            'data' => $legalCase,
        ]);
        
    }
}
