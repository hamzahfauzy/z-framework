<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;


class Hello extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		// $request = new Request;
		// $user = User::where('username','username1')->where('password','password2')->get();
		// if(empty($user))
		// 	echo "Tidak ada data";
		// else
		// 	print_r($user);
		// echo "<br>";
		// echo Session::user()->username;

		return $this->view->render("index");
	}

	function login()
	{
		Session::set("userid",2);
	}

	function logout()
	{
		Session::destroy();
	}
}