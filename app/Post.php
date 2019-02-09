<?php
namespace app;
use vendor\zframework\Model;

class Post extends Model
{
	static $table = "posts";
	static $fields = ["id","user_id","post_title","post_content"];
}
