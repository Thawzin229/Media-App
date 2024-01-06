<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class listController extends Controller
{
    //lsit page 
    public function listPage(){
        $searchVal = request("searchVal");
        $userData  = User::when($searchVal , function($table,$searchVal){
            $table->orwhere("name" , "like" , "%{$searchVal}%")
                ->orwhere("email" , "like" , "%{$searchVal}%")
                ->orwhere("gender" , "like" , "%{$searchVal}%")
                ->paginate();
        })->where("role" , "admin")->paginate();
        return view("admin.adminlist.list",compact("userData"));
    }

    //delete user list 
    public function deleteUser($id){
        User::where("id" ,$id)->delete();
        return redirect()->route('admin#listPage')->with(["deleteStatus" => "user profile deleted successfully"]);
    }
}
