<?php
namespace vendor\zframework;
use vendor\zframework\Route;

class Autoloader
{
	function __construct()
	{
		$uri = urldecode(
			parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
		);

		require("../config/Routes.php");

		$error = true;

		if($_SERVER['REQUEST_METHOD']  == "GET"):

			foreach (Route::fetchGet() as $key => $value) {
				if($value['url'] == $uri){
					$arr = explode("@", $value["controller"]);
					$arr[0] = "controllers\\".$arr[0];
					$class = new $arr[0];
					if($value['param'])
					{
						$output = "";
						foreach ($value['param'] as $k => $val) {
							if(!isset($_GET[$val]))
								$output .= "Parameter ".$val." Doesn't Exists<br>";
							$param[] = $_GET[$val];
						}
						if(!empty($output))
						{
							echo $output;
							$error = false;
							break;
						}
						call_user_func_array(array($arr[0], $arr[1]), $param);
					}else
						$class->{$arr[1]}(false);
					$error = false;
					break;
				}
			}


		elseif($_SERVER['REQUEST_METHOD'] == "POST"):
		foreach (Route::fetchPost() as $key => $value) {
			if($value['url'] == $uri){
				$arr = explode("@", $value["controller"]);
				$arr[0] = "controllers\\".$arr[0];
				$class = new $arr[0];
				$class->{$arr[1]}();
				$error = false;
				break;
			}
		}
		endif;

		if($error) echo "<h2>Error Not Found</h2>";
	}
}