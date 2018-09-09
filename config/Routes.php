<?php
use vendor\zframework\Route;

Route::get("/","IndexController@index");
Route::get("/login","IndexController@login");
Route::get("/register","IndexController@register");
Route::get("/logout","IndexController@logout");

Route::prefix("/admin")->middleware("Admin")->namespace("Admin")->group(function(){
	Route::get("/","IndexController@index");
});