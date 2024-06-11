<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //direct post page
    public function index(){
        $categories = Category::get();
        $posts = Post::get();
        return view('admin.post.index',compact('categories','posts'));
    }

    //create post
    public function createPost(Request $request){
        // dd($request->all());
        $this->validationCheck($request);
        $categories = Category::get();
        $data = [
            'title'=>$request->postTitle,
            'description'=>$request->postDescription,
            'category_id'=>$request->postCategory,
        ];

        if($request->hasFile('postImage')){
            $imageName = uniqid() .'_'. $request->file('postImage')->getClientOriginalName();
            $data['image'] = $imageName;
            $request->file('postImage')->move(public_path().'/postImage',$imageName);

        }

        Post::create($data);
        $posts = Post::get();
        return redirect()->route('admin#post',compact('categories','posts'));
    }

    //validation check
    private function validationCheck($request){
        Validator::make($request->all(),[
            'postTitle'=>'required|min:4',
            'postDescription'=>'required',
            'postCategory'=>'required',
        ])->validate();
    }
}
