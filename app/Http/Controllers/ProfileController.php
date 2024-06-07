<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    //direct change password page
    public function changePasswordPage(){
        return view('admin.profile.changePassword');
    }

    //change password
    public function changePassword(Request $request){
        // dd($request->all());
        $validator = $this->passwordValidationCheck($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $dbData = User::where('id',Auth::user()->id)->first();
        $dbPassword = $dbData->password;
        $inputPassword = $request->adminOldPassword;

        if(Hash::check($inputPassword, $dbPassword)){
            $data = [
                'password'=>Hash::make($request->adminNewPassword),
                'updated_at'=>Carbon::now(),
            ];
            User::where('id',Auth::user()->id)->update($data);
            return back()->with(['changeSuccess'=>'Passsword Changed!']);
        }
        else{
            return back()->with(['notMatch'=>'Old password is wrong! Try agin!']);
        }
    }


    //account update validation check
    private function userValidationCheck($request){
        Validator::make($request->all(),[
            'adminName'=>'required',
            'adminEmail'=>'required',
        ],[
            'adminName.required'=>'Name is required!',
            'adminEmail.required'=>'Email is required!',
        ])->validate();
    }

    //password change vaildation check
    private function passwordValidationCheck($request){
        $validationRules = [
            'adminOldPassword'=> 'required',
            'adminNewPassword'=>'required|min:8',
            'adminConfirmPassword'=>'required|min:8|same:adminNewPassword',
        ];
        $validationMessages = [
            'adminOldPassword.required'=>'Old Password is required!',
            'adminNewPassword.required'=>'New Password is required!',
            'adminConfirmPassword.required'=>'Confrim Password is required!',
            'adminConfirmPassword.same' => 'New password & confirm password must be the same!'
        ];
        return Validator::make($request->all(),$validationRules,$validationMessages);
    }
}
