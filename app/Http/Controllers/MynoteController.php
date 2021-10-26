<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class MynoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userID = Auth::id();     
         $select = "SELECT list.*,cat.category as catname,cat.id as catid, count(list.category) as Count 
                       FROM addsnippet as list
                    LEFT JOIN category as cat
                    ON list.category = cat.id
                    where list.userID = {$userID} and cat.userID = {$userID}
                    GROUP BY list.category";

            $getAll = DB::select($select);


        return view('mynote2', compact('getAll'));
    }
}
