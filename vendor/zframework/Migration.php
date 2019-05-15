<?php
namespace vendor\zframework;

class Migration 
{
	private $file_content;

	public function __construct($file_content)
	{
		$this->file_content = $this->prepareJSON($file_content);
	}

	function prepareJSON($input) {

	    //This will convert ASCII/ISO-8859-1 to UTF-8.
	    //Be careful with the third parameter (encoding detect list), because
	    //if set wrong, some input encodings will get garbled (including UTF-8!)
	    $input = mb_convert_encoding($input, 'UTF-8', 'ASCII,UTF-8,ISO-8859-1');

	    //Remove UTF-8 BOM if present, json_decode() does not like it.
	    if(substr($input, 0, 3) == pack("CCC", 0xEF, 0xBB, 0xBF)) $input = substr($input, 3);

	    return $input;
	}

	public function parseToQuery()
	{
		$jsonData = json_decode($this->file_content);
		$sql = "";

		if($jsonData->action == "create")
		{
			$sql = "CREATE TABLE ".$jsonData->table_name;
		}

		if($jsonData->action == "add column")
		{
			$sql = "ALTER TABLE ".$jsonData->table_name;
		}

		$fields = "";
		foreach ($jsonData->fields as $key => $value) {
			$fields .= " ".$value->name." ".$value->data_type;
			if(isset($value->length))
			{
				$fields .= "(".$value->length.")";
			}
			if(isset($value->default))
			{
				if($value->default != "auto_increment")
					$fields .= " default";
				$fields .= " ".$value->default;
			}
			else
			{
				$fields .= " NOT NULL";
			}
			if (next($jsonData->fields)==true) $fields .= ",";
		}

		if(isset($jsonData->primary_key))
		{
			$fields .= ", PRIMARY KEY (".$jsonData->primary_key.")";
		}

		if(isset($jsonData->foreign_key))
		{
			foreach ($jsonData->foreign_key as $key => $value) {
				$fields .= ", CONSTRAINT ".$jsonData->table_name."_".$value->field_name."_foreign FOREIGN KEY (".$value->field_name.")";
				$fields .= " REFERENCES ".$value->references."(".$value->references_field.")";
				$fields .= " ON DELETE ".$value->event->delete;
				$fields .= " ON UPDATE ".$value->event->update;
			}
		}

		$sql .= "(".$fields.")";

		return $sql;
	}

	function parseToSeederQuery()
	{
		$jsonData = json_decode($this->file_content,true);
		$table_name = $jsonData['table_name'];
		$sql = "INSERT INTO ".$table_name;
		$insert = "";
		$data = $jsonData['values'];
		foreach ($data as $rows) {
			$set = "";
			$values = "";
			foreach ($rows as $k => $row) {
				$set .= $k.",";
				if(is_array($row))
				{
					if($row['option'] == "md5")
					{
						$values .= "'".md5($row['value'])."',";
					}
				}
				else
					$values .= "'".$row."',";
			}
			$set = rtrim($set,",");
			$values = rtrim($values,",");
			$insert .= "($values),";
		}

		$insert = rtrim($insert,",");

		$sql = $sql . " ($set) VALUES ".$insert;
		return $sql;
	}

	function clean()
	{
		$jsonData = json_decode($this->file_content,true);
		$table_name = $jsonData['table_name'];
		return "TRUNCATE TABLE ".$table_name;
	}

	function drop()
	{
		$jsonData = json_decode($this->file_content);
		return "DROP TABLE ".$jsonData->table_name;
	}
}