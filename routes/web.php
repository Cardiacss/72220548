<?php

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
Route::group(['middleware' => ['guest']],function(){
    Route::get("/", "PageController@login")->name("login");
    Route::post("/login", "AuthController@ceklogin");
});
Route::group(['middleware' => ['auth']],function(){
    Route::get("/user","PageController@formedituser");
Route::post("/updateuser","PageController@updateuser");
Route::get("/logout","AuthController@ceklogout");
Route::get("/laptop","PageController@laptop");
Route::get("/home","PageController@home");
Route::get("/keranjang","PageController@keranjang");
Route::get("/About","PageController@about");
Route::get("/laptop/add-form","PageController@formaddlaptop");
Route::post("/save", "PageController@savelaptop");
Route::get("/laptop/edit-form/{id}","PageController@formeditlaptop");
Route::put('update/{id}', "PageController@updatelaptop");
Route::get("/delete/{id}","PageController@deletelaptop");
});