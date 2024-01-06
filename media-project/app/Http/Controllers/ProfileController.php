<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //profile page
    public function profilePage(){
        return view("admin.profile.profile");
    }

    //update profile

    public function updateProfile(Request $data){
        $id = Auth::user()->id;
        $this->validationForUpdate($data);
        $finalData = $this->indirectData($data);
        User::where("id" ,$id)->update($finalData);
        return redirect()->route('admin#profilePage')->with(["status" => "Profile updated successfully"]);

    }

    //change passs page 
    public function changePasswordPage(){
        return view("admin.profile.password");
    }

    //change pass
     public function changePassword(Request $data){
        $id = Auth::user()->id;
        $this->validationForPass($data);
        $finalDataForPass = $this->indirectDataForPass($data);
        $oldFile  = User::where("id" ,$id)->first()->toArray();
        $dataBasePass = $oldFile["password"];
        if(Hash::check($data->oldpassword , $dataBasePass)){
            User::where("id" ,$id)->update($finalDataForPass);
            return redirect()->route("admin#loginPage");
        }else{
            return redirect()->route("admin#changePasswordPage")->with(["pass-error" => "old password is invalid"]);
        }
        

     }

     //inditect data

    public function indirectDataForPass($data){
        $indirectDataForPass = [
            "password"  =>  Hash::make($data->newpassword)
        ];

        return $indirectDataForPass;
    }

     //validation for change pass
    public function validationForPass($data){
        $validationRulesforPass = [
            "oldpassword" => "required",
            "newpassword" => "required|min:8",
            "comfirmpassword" => "required|same:newpassword",
        ];
        Validator::make($data->all() , $validationRulesforPass)->validate();
    }

    //indirect data
    public function indirectData($data){
        $indirectData = [
            "name" => $data->name,
            "email" => $data->email,
            "phnumber" => $data->phnumber,
            "address" => $data->address,
            "gender" => $data->gender,
        ];
        return $indirectData;
    }

    //validation 
    public function validationForUpdate($data){
        $validationRules = [
            "name" => "required",
            "email" => "required|unique:users,email",
            "phnumber" => "required",
            "address" => "required",
            "gender" => "required"
        ];
        Validator::make($data->all() , $validationRules)->validate();
    }
}
