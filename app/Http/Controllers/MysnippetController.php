<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddnoteModel;
use DB;
use Illuminate\Support\Facades\Auth;
class MysnippetController extends Controller
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
    public function index($id)
    {  
        $userID = Auth::id();    
        $nameCategory = DB::table("category")->where(['userID'=>  Auth::id() ])
                        ->where(['id'=>$id])->get();
        $catname = ($nameCategory[0]->category);
       

        $select = "SELECT list.title as title,list.id as id,cat.category as catname 
                   FROM addsnippet as list 
                   INNER JOIN category as cat ON list.category = cat.id 
                   where list.category = $id and list.userID = {$userID}";

        $allcats = DB::select($select);
      
        return view('viewsnippet', compact('allcats','catname'));
    }

    public function view($id){
        $userID = Auth::id();  
        $select = "SELECT * from addsnippet where userID={$userID} and id={$id}";
        $allcats = DB::select($select);


        return view('viewsnippet-record', compact('allcats'));
    }

}
?>