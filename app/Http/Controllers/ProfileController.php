<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //direct profile page
    public function index(){
        return view('admin.profile.index');
    }
}
