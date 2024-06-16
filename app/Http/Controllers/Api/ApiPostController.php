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
}
