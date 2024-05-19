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



    public function search(Request $request)
    {
        $filter = $request->input('searchFilter');
        $input = $request->input('searchInput');


        // Ensure the filter is a valid column name to prevent SQL injection
        $validColumns = ['firstname', 'lastname', 'email', 'phone_number', 'address', 'city']; // Add more columns as needed
        if (!in_array($filter, $validColumns)) {
            // Handle invalid column name here
            return redirect()->back()->with('error', 'Invalid column selected.');
        }

        // Use Eloquent to query the User table based on the filter and input
        $users = User::where($filter, 'like', "%$input%")->paginate(10);

        // Pass the $users collection to your view or do whatever you need with it
        return view('admin.show-user', ['users' => $users, 'filter' => $filter]);
    }

    public function edit(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        return view('admin.details', ['user' => $user]);
    }
    public function update(Request $request, $id)
    {

        $user = User::where('id', $id)->first();
        $user->update($request->all());
        Session::flash('success', 'Data updated successfully.');
        return redirect()->back()->with('status', 'user-updated');
    }
}
