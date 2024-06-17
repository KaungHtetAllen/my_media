<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //get  all category
    public function getAllCategory(){
        $categories = Category::get();
        return response()->json([
            'categories'=>$categories
        ]);
    }

    //search post with category
    public function categorySearch(Request $request){
        // logger($request->all());
        $posts = Category::select('posts.*','categories.title as category_title','categories.description as category_description')
                    ->join('posts','categories.id','posts.category_id')
                    ->where('categories.title','like','%'.$request->key.'%')
                    ->get();
        return response()->json([
            'result'=>$posts
        ]);
    }
}
