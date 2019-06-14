<?php
namespace app;
use vendor\zframework\Model;

class Post extends Model
{
	static $table = "posts";
	static $fields = ["id","user_id","post_title","post_content","created_at","updated_at"];

	function user()
	{
		return $this->hasOne(User::class,['id' => 'user_id']);
	}

}
