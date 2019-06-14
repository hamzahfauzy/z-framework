<?php
namespace app\middleware;
use vendor\zframework\Middleware;
use vendor\zframework\Session;

class Auth extends Middleware
{
	
	function __construct()
	{
		$condition = !isset(Session::user()->id); // == "Admin");
		$redirect = "/home";
		parent::__construct($condition,$redirect);
	}
}
