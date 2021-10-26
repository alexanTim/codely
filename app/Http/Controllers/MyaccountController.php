<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Illuminate\Validation\Rule;
class MyaccountController extends Controller
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
        $users =  auth()->user();       
        return view('profile2',compact('users'));
    }

    /**
     *  Validate Password
     */
    public function saveAccountPassword(Request $request){   
        $user =  Auth::user();  
        
        $select = DB::table('users')->where(['id'=>$user->id])->first();
                     
        if($select)
        {
            if (Hash::check($request->input('currentpassword'), $select->password)) 
            {
                $request->validate([                  
                    'password'  => 'required|string|min:9|confirmed'                   
                ]);   

                $user = User::find($user->id);                               
                $user->password = Hash::make($request->input('password'));                            
                $user->save();  // Update the data  
                return back()->with('success', 'Password successfully updated.'); 
            } else{
                return back()->with('error_passowrd', 'Current password is incorrect.'); 
            }         
        }
    }
    
    /**
     *  Validate Profile
     */
    public function saveAccount(Request $request){           
            $user = Auth::user();  

            $request->validate([
                'firstname' => 'required',
                'lastname'  => 'required',               
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            ]);                    
            
            //Flash::message('Your account has been updated!');
            //return Redirect::to('/account');          
           
            DB::table('users')
					->where('id', $user->id)->update(
                        [
                        'firstname' => $request->input('firstname'),
                        'lastname' => $request->input('lastname'),
                        'email' => $request->input('email'),                     
                        ]	
                     );           

            return back()->with('success', 'User created successfully.');
    }
}
