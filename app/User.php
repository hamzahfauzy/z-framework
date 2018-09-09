<?php
namespace app;
use vendor\zframework\Model;

class User extends Model
{
	static $table = "users";
	static $fields = ["id","username","password","level"];
}