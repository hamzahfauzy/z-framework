<?php
use vendor\zframework\Route;

Route::get("/","IndexController@index");
Route::get("/show/{id}","IndexController@user");