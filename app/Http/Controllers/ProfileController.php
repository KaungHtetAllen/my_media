<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //direct profile page
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('admin.profile.index',compact('user'));
    }
}
