<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AddnoteModel;
use DB;
use App\Classes\Common;

class AddnoteController extends Controller
{
    private $userID;
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
        $getAllcategory = DB::table('category')
                          ->where(['userID'=>Auth::id()])					
                          ->get();

        $title  = '';
        $code   = '';
        $getSnippetCatid = '';

        // check if empty, insert here to mark as we are from addnote page
        if($getAllcategory->isEmpty()){
            $newdata = new Common();
            $newdata->insertURl('addnote');
        }        

        return view('addnote2',compact('getSnippetCatid','title','code','getAllcategory'));
    }

    /**
     *  Add note
     */
    public function addnote( Request $request){ 
       $POST = [
                'title'=> $request->input('title'),
                'code' => $request->input('code'),
                'category' => $request->input('category'),
               ];

        $checkifID =  $request->input('updateID');

        if(isset($checkifID) and !empty($checkifID))
        {
            DB::table("addsnippet")
                ->where(['userID'=>  Auth::id() ])
                ->where('id',  $request->input('updateID'))->update( [
                'title'=> $request->input('title'),
                'code' => $request->input('code'),
                'category' => $request->input('category'),
               ]);
        }else{
            DB::table('addsnippet')->insert( array_merge($POST,['userID'=>  Auth::id() ]) );
            DB::getPdo()->lastInsertId();
        }
         
        return response()->json(array('html' => 'success'));
    }

    public function updateSnippet($id){       
        $getAllcategory = DB::table('category')->where(['userID'=> Auth::id() ])->get();
        $getSnippet = DB::table('addsnippet')
                    ->where(['userID'=>  Auth::id() ])->where(['id'=>$id])			
                    ->get();

        $title = '';
        $code  = '';
        $data  = [];
        $getSnippetCatid = '';
        if(!$getSnippet->isEmpty()){           
            $title =$getSnippet[0]->title;
            $code =$getSnippet[0]->code;  
            $getSnippetCatid =   $getSnippet[0]->category;          
        }

        return view('addnote2',compact('getSnippetCatid','title','code','getAllcategory','getSnippet'));
    }

    public function deleteSnippet(Request $request){                 
            DB::table('addsnippet')->where(['userID'=>  Auth::id() ])
            ->where(['id'=>$request->input('id')])->delete();
            return response()->json(array('html' => 'success'));        
    }
}