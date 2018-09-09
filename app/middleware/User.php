<?php
namespace app\middleware;
use vendor\zframework\Middleware;
use vendor\zframework\Session;

class User extends Middleware
{
	
	function __construct()
	{
		$condition = (Session::user()->level == "User");
		$redirect = "/login";
		parent::__construct($condition,$redirect);
	}
}