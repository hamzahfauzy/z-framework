<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		return $this->view->render('index');
	}

	function home()
	{
		$users = User::get();
		return $this->view->render('home')->with('users',$users);
	}

}
