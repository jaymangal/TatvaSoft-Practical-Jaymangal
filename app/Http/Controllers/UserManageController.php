<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blogs;
use DB;
use Session;

class UserManageController extends Controller
{
    //


    public function registerUser(Request $request){

       /* Validate inputs */
        $this->validate($request,[
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        /* Register user details in DB */

        $user = new User;
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = $request['password'];

        /* Save the details in users table */
        $register_success = $user->save();

        $suceess1 = $user->id;

        $blog = DB::select("SELECT * from blogs");

        if($register_success == 1){  //if registeration is success
            Session::flash('message','Success!');
                return  view('dashboard',compact('blog','suceess1'));
            }else{  // if regstarion fail
                return view('login');
        }
    }

    public function loginUser(Request $request){

        $this->validate($request,[
            "email" => "required|email",
            "password" => "required"
        ]);

    $email = $request['email'];
    $password = $request['password'];

       $suceess= DB::select("SELECT * from users where email = '$email' and password = '$password'");

       $blog = DB::select("SELECT * from blogs");

    //    dd($blog);

        

       /* check if aany count is found from database */
       if(count($suceess) == 1){
           $suceess1 = $suceess[0]->id;
        Session::flash('message','Success!');
        return view('dashboard',compact('blog','suceess1'));
       }else{
        return view('login');
       }
    }
    public function dashboarddata(){
        $blog = DB::select("SELECT * from blogs");
        // $blog_id = $blog[0]->user_id; 
        return view('dashboard',compact('blog'));
        }
    
}
