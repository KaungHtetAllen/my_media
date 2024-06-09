<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category page
    public function index(){
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    //create category
    public function createCategory(Request $request){
        // dd($request->all());
        $this->categoryCreateValidationCheck($request);
        $data = [
            'title'=>$request->categoryName,
            'description'=>$request->categoryDescription
        ];

        Category::create($data);
        return redirect()->route('admin#category');
    }

    //category create validation check
    private function categoryCreateValidationCheck($request){
        $validationRules = [
            'categoryName'=>'required|min:4',
            'categoryDescription'=>'required|',
        ];
        $validationMessages = [
            'categoryName.required'=>'Category Name is required!',
            'categoryDescription.required'=>'Category Description is required!',
            'categoryName.min'=>'Category Name must be at least 4 characters!',
        ];
        Validator::make($request->all(),$validationRules,$validationMessages)->validate();
    }
}
