<?php
namespace vendor\zframework;

class Auth {

	static function routes()
	{
		Route::middleware('Auth')->namespaces("Auth")->group(function(){
			Route::get('/login','AuthController@login');
			Route::get('/register','AuthController@register');

			Route::post('/login','AuthController@doLogin');
			Route::post('/register','AuthController@doRegister');

			Route::post('/logout','AuthController@logout');
		});
	}
}