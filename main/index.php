<?php
spl_autoload_register( function( $class_name ) {
	$file = "../".$class_name .'.php';
	$file = str_replace("\\", "/", $file);
	if(file_exists($file))
		require_once $file;
	else
		die("File $file Doesn't Exists");
});

new vendor\zframework\Autoloader;