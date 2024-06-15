<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiPostController extends Controller
{
    //get all post
    public function getAllPost(){
        $posts = Post::get();
        return response()->json([
            'data'=>$posts
        ]);
    }
}
