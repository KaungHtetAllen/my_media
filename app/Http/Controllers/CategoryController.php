<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $this->categoryValidationCheck($request);
        $data = [
            'title'=>$request->categoryName,
            'description'=>$request->categoryDescription
        ];

        Category::create($data);
        return redirect()->route('admin#category');
    }

    //delete category
    public function deleteCategory($id){
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Category is Deleted!']);
    }

    //search category
    public function categorySearch(Request $request){
        $categories = Category::orWhere('title','like','%'.$request->categorySearchKey.'%')
                                ->orWhere('description','like','%'.$request->categorySearchKey.'%')
                                ->get();
        return view('admin.category.index',compact('categories'));
    }

    //direct category edit page
    public function categoryEditPage($id){
        $categories = Category::get();
        $updatedData = Category::where('id',$id)->first();
        // dd($updatedData->toArray());
        return view('admin.category.edit',compact('categories','updatedData'));
    }

    //update category
    public function updateCategory(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = [
            'title'=>$request->categoryName,
            'description'=>$request->categoryDescription,
            'updated_at'=>Carbon::now(),
        ];

        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('admin#category')->with(['updateSuccess'=>'Category is updated!']);
    }







    //category create validation check
    private function categoryValidationCheck($request){
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
