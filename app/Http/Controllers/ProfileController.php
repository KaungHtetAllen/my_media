<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //direct profile page
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('admin.profile.index',compact('user'));
    }

    //update admin account
    public function updateAdminAccount(Request $request){
        // dd($request->all());
        $this->userValidationCheck($request);
        $data = [
            'name'=> $request->adminName,
            'email'=> $request->adminEmail,
            'phone'=> $request->adminPhone,
            'address'=> $request->adminAddress,
            'gender'=> $request->adminGender,
            'updated_at' => Carbon::now()
        ];

        User::where('id',Auth::user()->id)->update($data);
        return back()->with(['updateSuccess'=>'Account Updated!']);
    }

    //user validation check
    private function userValidationCheck($request){
        Validator::make($request->all(),[
            'adminName'=>'required',
            'adminEmail'=>'required',
        ],[
            'adminName.required'=>'Name is required!',
            'adminEmail.required'=>'Email is required!',
        ])->validate();
    }
}
