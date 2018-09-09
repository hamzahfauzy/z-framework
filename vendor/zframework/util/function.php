<?php


function base_url()
{
	if(!empty(path_name) || path_name != false)
		return "http://".$_SERVER['SERVER_NAME']."/".path_name."/main";
	else
		return "http://".$_SERVER['REQUEST_URI'];
}