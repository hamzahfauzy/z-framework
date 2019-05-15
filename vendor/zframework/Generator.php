<?php 
namespace vendor\zframework;

class Generator
{
	public $file_contents;
	public $table_name;
	public $fields;

	function __construct($file)
	{
		if(!empty($file))
		{
			$this->file_contents = json_decode($file);
			$this->table_name = $this->file_contents->table_name;
			foreach ($this->file_contents->fields as $key => $value) {
				$this->fields .= '"'.$value->name.'"';
				if (next($this->file_contents->fields)==true) $this->fields .= ",";
			}
		}
	}

	function generateModel($param)
	{
		$fields = "";
		foreach ($param['fields'] as $key => $value) {
			$fields .= '"'.$value.'"';
			if (next($param['fields'])==true) $fields .= ",";
		}
		$file_template = file_get_contents("vendor/zframework/template/model.template");
		$file_template = iconv("CP1257","UTF-8", $file_template);
		$file_template = str_replace("{{modelname}}", ucwords($param['model_name']), $file_template);
		$file_template = str_replace("{{tablename}}", $param['table_name'], $file_template);
		$file_template = str_replace("{{fields}}", $fields, $file_template);
		file_put_contents("app/".ucwords($param['table_name']).".php", $file_template);
	}

	function generateMigration($param)
	{
		$file_template = file_get_contents("vendor/zframework/template/migration_table.template");
		$file_template = iconv("CP1257","UTF-8", $file_template);
		$file_template = str_replace("{{action}}", $param['action'], $file_template);
		$file_template = str_replace("{{tablename}}", $param['table_name'], $file_template);
		file_put_contents("migrations/tables/".$param['migration_name'], $file_template);
	}

	function generateSeeder($param)
	{
		$file_template = file_get_contents("vendor/zframework/template/migration_seed.template");
		$file_template = iconv("CP1257","UTF-8", $file_template);
		$file_template = str_replace("{{tablename}}", $param['table_name'], $file_template);
		file_put_contents("migrations/seeds/".$param['seeder_name'], $file_template);
	}

	function generateController($controller_name)
	{
		$file_template = file_get_contents("vendor/zframework/template/controller.template");
		$file_template = iconv("CP1257","UTF-8", $file_template);
		$delimiter = strstr($controller_name,"/");
		if($delimiter > -1)
		{
			$controller_name = explode("/", $controller_name);
			$name = end($controller_name);
			array_pop($controller_name);
			$namespace = implode("\\", $controller_name);
			$file_template = str_replace("{{controllername}}", $name, $file_template);
			$file_template = str_replace("{{namespace}}", "\\".$namespace, $file_template);
			$file = $namespace."/".$name;	
		}
		else
		{
			$name = $controller_name;
			$file_template = str_replace("{{controllername}}", $name, $file_template);
			$file_template = str_replace("{{namespace}}", "", $file_template);
			$file = $name;
		}
		file_put_contents("app/controllers/".$file.".php", $file_template);
	}

	function generateMiddleware($middleware_name)
	{
		$file_template = file_get_contents("vendor/zframework/template/middleware.template");
		$file_template = iconv("CP1257","UTF-8", $file_template);
		$file_template = str_replace("{{middlewarename}}", $middleware_name, $file_template);
		file_put_contents("app/middleware/".$middleware_name.".php", $file_template);
	}
}