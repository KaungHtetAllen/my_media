<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminListController extends Controller
{
    //direct admin list page
    public function index(){
        return view('admin.admin_list.index');
    }
}
