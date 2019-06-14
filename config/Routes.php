<?php
use vendor\zframework\Auth;
use vendor\zframework\Route;

Route::get("/","IndexController@index");

Auth::routes(); 

Route::get('/home','IndexController@home');