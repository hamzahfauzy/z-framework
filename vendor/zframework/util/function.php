<?php


function base_url()
{
    $protocol = isSecure() ? "https" : "http";
	if(!empty(path_name) || path_name != false)
		return $protocol."://".$_SERVER['SERVER_NAME']."/".path_name."/".main_name;
	else
		return $protocol."://".$_SERVER['HTTP_HOST'];
}


function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}

function old($key)
{
	return isset($_SESSION["old"][$key]) ? $_SESSION["old"][$key] : "";
}
