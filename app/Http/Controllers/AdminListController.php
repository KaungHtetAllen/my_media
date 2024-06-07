<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminListController extends Controller
{
    //direct admin list page
    public function index(){
        $users = User::get();
        return view('admin.admin_list.index',compact('users'));
    }

    //delete admin account
    public function delete($id){
        User::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Admin Account Deleted!']);
    }
}
