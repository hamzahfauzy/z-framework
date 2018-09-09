<?php
namespace vendor\zframework\util;

class Assets
{
	public static function get($src)
	{
		return "http://".$_SERVER['HTTP_HOST']."/".$src;
	}
}