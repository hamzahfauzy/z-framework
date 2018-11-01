<?php
namespace vendor\zframework;
use vendor\zframework\Route;
use vendor\zframework\Session;
use vendor\zframework\util\Request;

class Autoloader
{
	function __construct()
	{
		ini_set("display_errors",1);

		require("../config/Path.php");
		require("../config/Routes.php");
		require("../vendor/zframework/util/function.php");

		Session::init();

		$uri = urldecode(
			parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
		);

		if(!empty(path_name) || path_name != false)
			$uri = str_replace("/".path_name."/".main_name, "", $uri);

		$error = true;

		if($_SERVER['REQUEST_METHOD']  == "GET"):
			$Route = Route::fetchGet($uri);
			if(!empty((array)$Route)):
				if(!empty($Route->middleware))
				{
					$middleware = "app\\middleware\\".$Route->middleware;
					new $middleware;
				}
				$class = new $Route->className;
				if(!empty($Route->param))
				{
					$output = "";
					foreach ($Route->param as $k => $val) {
						if(!isset($_GET[$val]))
							$output .= "Parameter ".$val." Doesn't Exists<br>";
						else
							$param[$val] = $_GET[$val];
					}
					if(!empty($output))
					{
						echo $output;
						$error = false;
					}else{
						$r = new \ReflectionMethod($Route->className, $Route->method);
						$params = $r->getParameters();
						foreach ($params as $key => $value) {
							$type = $value->getType();
							if(strcmp($type,"app\\") > -1)
							{
								$type = str_replace("\\", "/", $type);
								$type = str_replace("/", "\\", $type);
								$obj = new $type;
								$obj = $obj->findParam($value->getName(), $_GET[$value->getName()],$type);
								$param[$value->getName()] = $obj;
							}

						}
						call_user_func_array(array(new $Route->className, $Route->method), $param);
					}
				}else
					$class->{$Route->method}(false);
				$error = false;
			endif;
		elseif($_SERVER['REQUEST_METHOD'] == "POST"):
			$Route = Route::fetchPost($uri);
			if(!empty($Route->middleware))
			{
				$middleware = "app\\middleware\\".$Route->middleware;
				new $middleware;
			}
			if(!empty((array)$Route)):
				$class = new $Route->className;
				$request = new Request;
				$class->{$Route->method}($request);
				$error = false;
			endif;
		endif;

		if($error) echo "<h2>Error Route Not Found</h2>";
	}
}