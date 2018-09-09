<?php
namespace app\middleware;
use vendor\zframework\Middleware;
use vendor\zframework\Session;

class Admin extends Middleware
{
	
	function __construct()
	{
		$condition = (Session::user()->level == "Admin");
		$redirect = "/";
		parent::__construct($condition,$redirect);
	}
}