<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
		// $this->middleware("Admin");
	}
	public function index()
	{
		echo "Admin/Index Controller";
	}
}