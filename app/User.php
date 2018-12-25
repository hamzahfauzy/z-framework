<?php
namespace app;
use vendor\zframework\Model;
use app\UserMeta;
use app\Post;

class User extends Model
{
	static $table = "users";
	static $fields = ["id","username","password","level"];

	function getUserMeta()
	{
		// return 1;
		return $this->hasOne(UserMeta::class, ["user_id"=>"id"]);
	}

	function getPosts()
	{
		return $this->hasMany(Post::class, ["user_id"=>"id"]);
	}
}