<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// login user 
Route::post("user/login",[AuthController::class,"userlogin"])->name("user#login");
Route::post("user/register",[AuthController::class,"userRegister"])->name("user#register");
Route::get("user/category" , [AuthController::class,"category"])->name("user#category")->middleware('auth:sanctum');
//product api
Route::get("post",[ApiController::class,"post"]);

// category api
Route::get("category",[ApiController::class,"category"]);

//search post
Route::post("searchpost",[ApiController::class,"searchPost"]);

// search Category
Route::post("searchcategory",[ApiController::class,"searchCategory"]);

// post detail
Route::post("postdetail",[ApiController::class,"postDetail"]);

//view count 
Route::post("viewcount",[ApiController::class,"viweCount"]);