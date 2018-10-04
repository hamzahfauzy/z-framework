<?php
use vendor\zframework\Route;

Route::get("/","IndexController@index");

Route::prefix("/admin")->middleware("Admin")->namespace("Admin")->group(function(){
	Route::get("/","IndexController@index");
});

Route::get("/hello","IndexController@hello");
Route::get("/tryparam/{param}","IndexController@tryparam");
Route::get("/user/{id}","IndexController@user");
Route::post("/posthandle","IndexController@posthandle");
Route::get("/login","IndexController@login");
Route::get("/register","IndexController@register");
Route::get("/logout","IndexController@logout");

