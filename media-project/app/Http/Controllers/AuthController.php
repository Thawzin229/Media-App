<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginPage(){
        return view("auth.login");
    }

    //register page 
    public function register(){
        return view("auth.register");
    }

    //user login
    public function userlogin(Request $data){
        $email = $data->email;
        $password = $data->password;
        $userdata = User::where("email",$email)->first();
        if(isset($userdata)){
            if(Hash::check($password , $userdata->password)){
                return response()->json([
                    "userdata" => $userdata,
                    "token" => $userdata->createToken(time())->plainTextToken
                ]);
            }else{
                return "wrong password";
            }
        }else{
            return response()->json([
                "token" => null
            ]);
        }


    }

    //register 
    public function userRegister(Request $data){
        $finalData = $this->indirectData($data);
        User::create($finalData);
        $email = $data->email;
        $userdata = User::where("email",$email)->first();
        if(isset($userdata)){
            return response()->json([
                "userdata" =>$userdata,
                "token" => $userdata->createToken(time())->plainTextToken
            ]);
        }else{
            return response()->json([
                "status" => "no data"
            ]);
        }
    }
    public function indirectData($data){
        $indirectData  =  [
            "name" => $data->name,
            "email"=> $data->email,
            "password" => Hash::make($data->password),
            "gender" => $data->gender,
            "address" => $data->address,
            "phnumber" => $data->phnumber
        ];

        return $indirectData;
    }

    //category

    public function category(){
        $data = Category::get();
        return response()->json([
            "data" => $data
        ]);
    }
}
