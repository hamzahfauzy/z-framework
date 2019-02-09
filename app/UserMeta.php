<?php
namespace app;
use vendor\zframework\Model;

class UserMeta extends Model
{
	static $table = "user_meta";
	static $fields = ["id","user_id","nama_lengkap","alamat","jenis_kelamin"];
}
