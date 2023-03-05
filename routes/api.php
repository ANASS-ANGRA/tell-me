<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
 //   return $request->user();
//});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();});
     Route::post("/new_post","PostController@new_post");
    Route::post("update_post","PostController@update_post"); 
    Route::get("/me_post","PostController@me_post");
    Route::get("/delete_post/{id}","PostController@delete_post");
    Route::get("/tous_post","PostController@tous_post"); 
    Route::get("/profile","UserController@profile");
    Route::get("/logout","UserController@logout");
    Route::post("update_password","UserController@update_password");
});
Route::post("/register","UserController@register");
Route::post('/login','UserController@login');
Route::post("code_validation","UserController@validation");
