<?php

namespace App\Http\Controllers\Api;

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
}
