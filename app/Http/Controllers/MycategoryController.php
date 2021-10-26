<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Classes\Common;
class MycategoryController extends Controller
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
        $common = new Common();
        $common->removeData();

        $allcats = DB::table('category')->where(['userID'=> Auth::id() ])->paginate(4);      
        return view('mycategory',compact('allcats'));
    }

    public function addCategory()
    {
        return view('addCategory');
    }

    /**
     *  Save Category
     */
    public function savecategory(Request $request){
        $redirectTo = '';
        $POST = ['userID'=>  Auth::id() , 'category'=> $request->input('category')];
         
        $checkfirstifexist =  DB::table('category')
                    ->where(['userID'=>  Auth::id() ])
                    ->where(['category'=> $request->input('category')])->get();

        if($checkfirstifexist->isEmpty()){

            // check if empty then check if also coming from addnote
            $categoryOfuser = DB::table('category')->where(['userID'=> Auth::id()])->get();
            if($categoryOfuser->isEmpty()){
               $newdata = new Common();
               
               if( $newdata->getPrevUrlData() == 'addnote'){
                    $redirectTo = 'addnote';
               }               
            }

            DB::table('category')->insert($POST);
            DB::getPdo()->lastInsertId();

            return response()->json(array('html' => 'success','redirect'=>$redirectTo));  
        } else{
            return response()->json(array('html' => 'failed','redirect'=>''));  
        } 
       
    }

    /**
     *  Delete Category
     */
    public function deleteCategory(Request $request){
        // check category exists in snippet table
        $checkifExist = DB::table('addsnippet')
                        ->where(['userID'=> Auth::id()])
                        ->where(['id'=>$request->input('id')])
                        ->get();

        if(!$checkifExist->isEmpty()){
            return response()->json(array('html' => 'failed'));
        }else{
            DB::table('category')->where(['userID'=> Auth::id()])
                                ->where(['id'=>$request->input('id')])
                                ->delete();

            return response()->json(array('html' => 'success'));
        }  
    }

    public function updateCategory($request){
        $title = 'Update';
        $categoryname = DB::table('category')
                ->select('category')
                ->where(['id'=>$request])
                ->where(['userID'=>  Auth::id() ])->get();
        $category = '';
        $id = $request;

        if(!$categoryname->isEmpty()){
           $category = $categoryname[0]->category;
        }       
          
        return view('updatecategory',compact('id','title','category'));
    }

    /**
     *   Update Category Save
     */
    public function updateCategorySave(Request $request){
        $id = $request->input('id');       
        $category = $request->input('category');
        DB::table("category")->where(['userID'=>  Auth::id() ])
            ->where('id', $id)->update(['category' => $category]);
        return response()->json(array('html' => 'success'));
    }
}