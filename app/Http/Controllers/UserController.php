<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    /* 
    public function index(Request $request)
    {
        $filter = $request->get('searchFilter');
        $roleClient = Role::where('name', 'Client')->first();

        if ($filter == 'all') {
            $users = User::where('role_id', $roleClient->id)->paginate(10);
        } elseif ($filter == 'role') {

            $users = User::where('role_id', $request->input('searchInput'))->paginate(10);
        } else {

            $input = $request->input('searchInput');
            // Ensure the filter is a valid column name to prevent SQL injection
            /*
            $validColumns = ['firstname', 'lastname', 'email', 'phone_number', 'address', 'city']; // Add more columns as needed
            if (!in_array($filter, $validColumns)) {
                // Handle invalid column name here
                return redirect()->back()->with('message', 'Invalid filter selected.');
            }

            // Use Eloquent to query the User table based on the filter and input
            $users = User::where($filter, 'like', "%$input%")->where('role_id', $roleClient->id)->paginate(10);
        }
        // Pass the $users collection to your view or do whatever you need with it
        return view('user.show', ['users' => $users, 'filter' => $filter]);
    }
*/


    public function index(Request $request, $f = null, $i = null)
    {
        $f = $request->query('f');
        $i = $request->query('i');

        // Filter check, sql injection protection
        $validColumns = ['firstname', 'lastname', 'email', 'phone_number', 'address', 'city', 'role', 'all'];
        if (!in_array($f, $validColumns)) {
            // Handle invalid column name here
            return redirect()->back()->with('message', 'Invalid filter selected.');
        }

        $roleClient = Role::where('name', 'Client')->first();
        foreach ($validColumns as $key => $value) {
            switch ($f) {
                case 'all':
                    $displayData = User::where('role_id', $roleClient->id)->paginate(10);
                    break;
                case 'role':
                    $displayData = User::where('role_id', $i)->paginate(10);
                    break;
                case $value:
                    $displayData = User::where($f, 'like', "%$i%")->where('role_id', $roleClient->id)->paginate(10);
                    break;
                default:
                    $displayData = '';
            }
        }
        // Add msg for display data sayin search is empty
        if ($displayData->isEmpty()) {
            return redirect()->back();
        }

        return view('user.show', ['users' => $displayData, 'filter' => $f, 'input' => $i]);
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
