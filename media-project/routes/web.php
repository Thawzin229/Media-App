<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\listController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get("/" , [AuthController::class,"loginPage"])->name("admin#loginPage");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::group(["prefix" => "admin"] , function(){
        Route::get("profile" , [ProfileController::class, "profilePage"])->name("admin#profilePage");
        Route::get("changepasswordpage",[ProfileController::class,"changePasswordPage"])->name("admin#changePasswordPage");
        Route::post("changePassword" , [ProfileController::class , "changePassword"])->name("admin#changePassword");
        Route::get("list" , [listController::class,"listPage"])->name("admin#listPage");
        Route::get("deleteadmin/{id}" , [listController::class, "deleteUser"])->name("admin#deleteUser");
        Route::get("post" , [PostController::class , "postPage"])->name("admin#postPage");
        Route::get("trendingpost" , [PostController::class , "trendingPostPage"])->name("admin#trendingPostPage");
        Route::get("category" , [CategoryController::class , "categoryPage"])->name("admin#categoryPage");
        Route::post("updateprofile" , [ProfileController::class,  "updateProfile"])->name("admin#updateProfile");

        //category 

        Route::post("createcategory",[CategoryController::class , "createCategory"] )->name("admin#createCategory");
        Route::get("deletecategory/{id}" ,[CategoryController::class, "deleteCategory"])->name("admin#deleteCategory");
        Route::get("editpage/{id}",  [CategoryController::class,"editPage"])->name("admin#editPage");
        Route::post("updatecategory", [CategoryController::class,"updateCategory"])->name("admin#updateCategory");

        //post 
        Route::post("createpost", [PostController::class, "createPost"])->name("admin#createPost");
        Route::get("deletepost/{id}", [PostController::class, "deletePost"])->name("admin#deletePost");
        Route::get("editpostpage/{id}", [PostController::class,"editPostPage"])->name("admin#editPostPage");
        Route::post("updatepost" ,[PostController::class,"updatePost"])->name("admin#updatePost");

        //trend post detail
        Route::get("trendpostdetail/{id}" , [PostController::class, "trendpostDetail"])->name("admin#trendpostDetail");


    });

});

//regisyter page 
Route::get("registerPage",[AuthController::class, "register"])->name("admin#registerPage");
