<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category page 
    public function categoryPage(){
        $searchVal =  request("searchVal");
        $data  = Category::when($searchVal, function($table,$searchVal){
            $table->where("name" , "like" , "%{$searchVal}%")->paginate();
        })->paginate();
        return view("admin.category.category", compact("data"));
    }

    //create 
    public function createCategory(Request $data){
        $this->vildation($data);
        $finalData = $this->indirectData($data);
        Category::create($finalData);
        return redirect()->route('admin#categoryPage');
    }

    //delete
    public function deleteCategory($id){
        Category::where("id" ,$id)->delete();
        return redirect()->route('admin#categoryPage');

    }

    //edit page
    public function editPage($id){
        $data = Category::where("id" ,$id)->first()->toArray();
        return view("admin.category.edit",compact("data"));
    }

    //update 
    public function updateCategory(Request $data){
        $id = $data->idforupdate;
        $this->vildationForUpdate($data);
        $finalDataForUpdate = $this->indirectDataForUpdate($data);
        Category::where("id",$id)->update($finalDataForUpdate);
        return redirect()->route('admin#categoryPage');
    }

    //indirect data for update
    public function indirectDataForUpdate($data){
        $indirectDataForUpdate  = [
            "name" => $data->nameforupdate
        ];
        return $indirectDataForUpdate;
    }

        //indirect data
        public function indirectData($data){
            $indirectData  = [
                "name" => $data->categoryname
            ];
            return $indirectData;
        }

    //validation 
    public function vildation($data){
        $validationRule = [
            "categoryname" => "required|min:3"
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }

      //validation for update
    public function vildationForUpdate($data){
        $validationRule = [
            "nameforupdate" => "required|min:3"
        ];
        Validator::make($data->all(),$validationRule)->validate();
    }
}
