<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;

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

	function logout()
	{
		Session::destroy();
		$this->redirect()->url("/");
	}
}