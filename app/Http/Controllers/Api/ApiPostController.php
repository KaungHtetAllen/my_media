<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPostController extends Controller
{
    //get all post
    public function getAllPost(){
        $posts = Post::select('posts.*','categories.title as category_title','categories.description as category_description')->leftJoin('categories','posts.category_id','categories.id')->get();
        return response()->json([
            'posts'=>$posts
        ]);
    }

    //data searching
    public function postSearch(Request $request){
        // logger($request->all());
        $posts =  Post::where('title','like','%'.$request->key.'%')->get();
        return response()->json([
            'searchData'=>$posts
        ]);
    }

    //
    public function postDetails(Request $request){
        $post = Post::where('id',$request->postId)->first();
        return response()->json([
            'post'=>$post
        ]);
    }
}
