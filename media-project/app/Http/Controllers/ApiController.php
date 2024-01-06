<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\View;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //product datas
    public function post(){
        $postData = Post::get();
        return response()->json([
            "post" => $postData
        ]);
    }

    //category data
    public function category(){
        $categoryData = Category::select("name","id")->get();
        return response()->json([
            "category" => $categoryData
        ]);
    }

    //search post
    public function searchPost(Request $data){
        $searchVal  = $data->searchVal;
        $postDataBySearch = Post::where("title","like" ,"%{$searchVal}%")->get();
        return response()->json([
            "data" => $postDataBySearch
        ]);
    }

    //search cateogry
    public function searchCategory(Request $data){
        $searchVal = $data->id;
        $postDataByCategory = Post::where("category_id" , $searchVal)->get();
        return response()->json([
            "result" => $postDataByCategory
        ]);
    }

    //post detail
    public function postDetail(Request $data){
        $id  = $data->postid;
        $Data = Post::where("id",$id)->first();
        return response()->json(["detailpost" => $Data]);

    }
    //viweCount
    public function viweCount(Request $data){
        $finalData = $this->indirectData($data);
        View::create($finalData);
        $post = View::where("post_id" ,$data->post_id)->get();
        return response()->json([
            "viewcount" => $post
        ]);
    }

    //indirect data
    public function indirectData($data){
        $indirectData  = [
            "user_id" => $data->userdata,
            "post_id" => $data->post_id,
            "quantity" => 0
        ];
        return $indirectData;
    }


}
