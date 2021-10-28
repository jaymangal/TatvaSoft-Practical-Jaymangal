<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use App\Blogs;
use DB;
use Session;

class BlogController extends Controller
{

    public function addBlog(Request $request,$user_id){

        // dd($request);
        $this->validate($request,[
            "title" => "required",
            "description" => "required"
        ]);

        $blog = new Blogs;
        $blog->title = $request['title'];
        $blog->description = $request['description'];
        $blog->user_id = $user_id;
       
        // dd(Input::file('image'));
        if($request['image'] != null){
        
            $imageName = time().'.'.$request->image->extension();   // create unique image name
            $request->image->move(public_path('images'), $imageName); //move to the public path
            $blog->image = $imageName;
        }
        $blog->save();
        $suceess= DB::select("SELECT * from users where id= '$user_id'");

        $suceess1 = $suceess[0]->id;
        return redirect('dashboard')->with(Session::flash('message','Success!'));

    }

    public function updateviewBlog($id){
        // dd($id);
        $blog = DB::select("SELECT * from blogs where id= '$id'");
        // dd($blog);
        // $blog = $blog[0];
        // dd($blog);
        return view('blog.edit',compact('blog'));


    }

    public function updateBlog(Request $request, $id){
        // dd($request->all());
        $this->validate($request,[
            "title" => "required",
            "description" => "required"
        ]);
       
        $blog = Blogs::find($id);
        
        $blog->title = $request['title'];
        $blog->description = $request['description'];
        // $blog->user_id = 1;
       
        if($request['image'] != null){
        
            $imageName = time().'.'.$request->image->extension();   // create unique image name
            $request->image->move(public_path('images'), $imageName); //move to the public path
            $blog->image = $imageName;

        }
        $blog->save();
        return redirect('dashboard')->with(Session::flash('message','Success!'));

    }

    public function deleteBlog($id){

        $delete = Blogs::find($id);
        $delete->delete();

        return redirect('dashboard');

    }
}
