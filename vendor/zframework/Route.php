<?php
namespace vendor\zframework;

class Route
{
	public static $_get = [];
	public static $_post = [];
	public static $base_prefix;

	public static function prefix($base_prefix)
	{
		self::$base_prefix = $base_prefix;
		return new static;
	}

	public static function group($callback)
	{
		return call_user_func($callback);
	}

	public static function get($url,$controller,$param=false)
	{

		if(!empty(self::$base_prefix))
			$url = self::$base_prefix . $url;
		if($url != "/") $url = rtrim($url,"/");
		$key = count(self::$_get);
		self::$_get[$key]["url"] = $url;
		self::$_get[$key]["controller"] = $controller;
		self::$_get[$key]["param"] = $param;
	}

	public static function post($url,$controller)
	{
		if(!empty(self::$base_prefix))
			$url = self::$base_prefix . $url;
		if($url != "/") $url = rtrim($url,"/");
		$key = count(self::$_post);
		self::$_post[$key]["url"] = $url;
		self::$_post[$key]["controller"] = $controller;
	}

	public static function fetchGet()
	{
		return self::$_get;
	}

	public static function fetchPost()
	{
		return self::$_get;
	}
}