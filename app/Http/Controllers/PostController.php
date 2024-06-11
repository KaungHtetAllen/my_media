<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    //delete post
    public function deletePost($id){
        // dd($id);
        $postData = Post::where('id',$id)->first();
        if($postData->image){
            File::delete(public_path().'/postImage/'.$postData->image);
        }
        Post::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Post is deleted!']);
    }

    //direct post edit page
    public function postEditPage($id){
        $data = Post::where('id',$id)->first();
        $categories = Category::get();
        $posts = Post::get();
        return view('admin.post.edit',compact('data','categories','posts'));
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
