<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //direct category page
    public function index(){
        return view('admin.category.index');
    }
}
