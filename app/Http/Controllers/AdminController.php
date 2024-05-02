<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(){

        return view('admin.panel');
    }

    public function show(Request $request, $param){
        $path = $request->path();
        $urlArray = explode('/', $path);


        foreach($urlArray as $key => $value){
        
            if($value == 'type'){
                $legalCases = LegalCase::where('case_type_id', $param)->with('user')->paginate(10);
            }elseif($value == 'status'){
                $legalCases = LegalCase::where('status', strtolower($param))->with('user')->paginate(10);
            }elseif($value == 'all'){
                $legalCases = LegalCase::paginate(10);
            }
        }
        Log::info($legalCases);
        if(!$legalCases){
            return redirect()->back();
        }
        return view('admin.show-search', ['legalCases' => $legalCases, 'filter' => $param]);
        
        
        
    }
}
