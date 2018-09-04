<?php
use vendor\zframework\Route;

Route::get("/","Hello@index");
Route::prefix("/hello")->group(function(){
	Route::get("/","Hello@index");
	Route::get("/index","Hello@index");
	Route::get("/world","Hello@add");
});

Route::prefix("/admin")->group(function(){
	Route::get("/","Admin@index");
});