<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.panel');
    }

    public function show(Request $request, $param)
    {
        $path = $request->path();
        $urlArray = explode('/', $path);
        $isUser = false;
        $displayData = '';

        foreach ($urlArray as $key => $value) {
            switch ($value) {
                case 'type':
                    $displayData = LegalCase::where('case_type_id', $param)->with('user')->paginate(10);
                    break;
                case 'status':
                    $displayData = LegalCase::where('status', strtolower($param))->with('user')->paginate(10);
                    break;
                case 'role':
                    $displayData = User::where('role_id', $param)->with('role', 'legalCases')->paginate(10);
                    break;
                case 'all':
                    $displayData = ($isUser) ? User::paginate(10) : LegalCase::paginate(10);
                    break;
                case 'user':
                    $isUser = true;
                    break;
            }
        }

        if (!$displayData) {
            return redirect()->back();
        }

        // need to make it short - fix views
        if ($isUser) {
            return view('admin.show-user', ['users' => $displayData, 'filter' => $param]);
        }
        return view('admin.show-case', ['legalCases' => $displayData, 'filter' => $param]);
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
