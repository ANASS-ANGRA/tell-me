<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
   Route::get("/post","PostController@form_post");
   Route::get("/me_post","PostController@me_post");
   Route::get("/delete_post/{id}","PostController@delete_post");
   Route::get("/tous_post","PostController@tous_post"); 
   Route::post("/new_post","PostController@new_post")->name("new_post");
   Route::post("update_post","PostController@update_post");
});
Route::get("test_v",function(){
    $data=[
        "name"=>"anass angra",
        "name_compte"=>"how i am",
        "code"=>"abc",
    ];
    return view("validation_compte",["data"=>$data]);
});
Route::get("code_validation/{code}","UserController@validation");