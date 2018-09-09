<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;

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