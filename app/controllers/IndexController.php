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
		return $this->view->render("index");
	}

	function posthandle(Request $request)
	{
		print_r($request);
	}

	function hello()
	{
		echo "Hello World";
	}

	function user(User $id)
	{
		print_r($id);
	}

	function tryparam($param)
	{
		echo $param;
	}

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}