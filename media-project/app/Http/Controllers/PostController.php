<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\View;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //post page 
    public function postPage(){
        $searchVal = request('searchVal');
        $categoryData = Category::paginate();
        $postData = Post::select("posts.*","categories.name as category_name")
        ->join("categories","posts.category_id","categories.id")
        ->when($searchVal , function($table , $searchVal){
            $table->orwhere("posts.title" ,"like" , "%{$searchVal}%")
            ->orwhere("categories.name" ,"like" , "%{$searchVal}%")
            ->paginate(3);
        })
        ->paginate(3);
        return view("admin.post.post",compact("categoryData","postData"));
    }

    //create post
    public function createPost(Request $data){
        $this->validation($data);
        $finalData = $this->indirectData($data);
        if($data->hasfile("image")){
            $filename = uniqid(). $data->file("image")->getClientOriginalName();
            $data->file("image")->storeAs("public",$filename);
        }else{
            $filename = null;
        }
        $finalData["image"] = $filename;
        Post::create($finalData);
        return redirect()->route('admin#postPage');
    }

    //delete post
    public function deletePost($id){
        $deletedPhoto = Post::where("id",$id)->first()->toArray();
        $photo = $deletedPhoto["image"];
        Storage::delete("public/".$photo);
        Post::where("id",$id)->delete();
        return redirect()->route('admin#postPage');
    }
    //edit page
    public function editPostPage($id){
        $categoryData = Category::paginate();
        $editData  = Post::where("id",$id)->first()->toArray();
        return view("admin.post.edit",compact("categoryData","editData"));
    }

    //update post 
    public function updatePost(Request $data){
        $id  = $data->idforupdate;
        $this->validationforupdate($data);
        $finalDataForUpdate = $this->indirectDataForupdate($data);
        if($data->hasFile("imageforupdate")){
            $oldfile = Post::where("id",$id)->first()->toArray();
            $oldimage = $oldfile["image"];
            if($oldimage != null){
                Storage::delete("public/".$oldimage);
            }
            $filename = uniqid().$data->file("imageforupdate")->getClientOriginalName();
            $data->file("imageforupdate")->storeAs("public", $filename);
            $finalDataForUpdate['image']  =$filename;
            Post::where("id" ,$id)->update($finalDataForUpdate);
            return redirect()->route('admin#postPage');


        }
    }

    //indirect dat  for update 

    public function indirectDataForupdate($data){
        $indirectDataForupdate = [
            "title" => $data->postnameforupdate,
            "description" => $data->descriptionforupdate,
            "category_id" => $data->categoryforupdate,
        ];
        return $indirectDataForupdate;
    }

    //indirect data
    public function  indirectData($data){
        $indirectData = [
            "category_id" => $data->categoryid,
            "title" => $data->postname,
            "description" => $data->description,
        ];
        return $indirectData;
    }

    //validation
    public function validation($data){
        $validationRule = [
            "postname" => "required",
            "description" => "required",
            "categoryid" => "required",
        ];
        Validator::make($data->all(), $validationRule)->validate();
    }

        //validation for update
        public function validationforupdate($data){
            $validationRule = [
                "postnameforupdate" => "required",
                "descriptionforupdate" => "required",
                "categoryforupdate" => "required",
                "imageforupdate" => "required",
            ];
            Validator::make($data->all(), $validationRule)->validate();
        }

    //trending post page 
    public function trendingPostPage(){
        $trendPost = View::select("posts.*", "views.*",DB::raw("COUNT('views.post_id') as count"))
        ->join("posts","posts.id","views.post_id")
        ->groupby("views.post_id")
        ->get();
        return view("admin.trendingpost.trendingpost" , compact("trendPost"));
    }

    //detail
    public function trendpostDetail($id){
        $post =  Post::where("id",$id)->first();
        return view("admin.trendingpost.trendpostdetail",compact("post"));
    }
}
