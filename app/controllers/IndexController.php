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
		$data = file_get_contents("http://eplanning.asahankab.go.id/API/v1/musrenbang/kelurahan/293");
		$data = json_decode($data);
		foreach($data as $row)
		{
			echo $row->Jenis_Usulan."<br>";
		}
		// return $this->view->render("index");
	}

	function posthandle(Request $request)
	{
		print_r($request);
	}

	function hello()
	{
		echo "Hello World";
	}

	function user($id)
	{
		$user = User::get();
		return $this->view->render("detail")->with("users",$user);
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