<?php
use vendor\zframework\Route;
use app\User;

Route::get("/","IndexController@index");
Route::get("/show/{id}","IndexController@user");
Route::get("/hello/{username}/{password}",function($username,$password){ 
	$user = User::where('username',$username)->where('password',$password)->first();
	if(empty($user))
	{
		echo "Not Found";
	}
	else
	{
		print_r($user);
	}
});
