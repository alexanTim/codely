<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public $newdata;
    public function __construct()
    {
        $this->middleware('auth');
       // $this->newdata = new Common();
    }

    public function index(){
       
        // $this->newdata->insertURl( Route::currentRouteName() );
        $userId = Auth::id();
        $select = "select count(*) as Count from category where userID={$userId}";
        $getAll = DB::select($select);
        
        $selectSnippet = "select count(*) as Count from addsnippet where userID={$userId}";
        $getAllSnippet = DB::select($select);
        
        $countAll = 0;
        $countAllsnipet = 0;

        if($getAll > 0){
          $countAll= $getAll[0]->Count;
        }else{
            $countAll = 0;
        }

        if($getAllSnippet > 0){
            $countAllsnipet= $getAllSnippet[0]->Count;
        }else{
            $countAllsnipet = 0;
        }
       
        return view('dashboard', compact('countAllsnipet','countAll'));
    }
}
