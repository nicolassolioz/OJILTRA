<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05

class Entity
{
	public $db_conn;
	public $table_name;
	public $column_prefix;
	public $id;
	
	public function __construct($tableName, $columnPrefix)
	{
		$this->db_conn = ConnectionManager::getConnection();
		$this->table_name = $tableName;
		$this->column_prefix = $columnPrefix;
	}
	
	public function getAllRows($orderBy = "")
	{
        $this->db_conn->query("SET NAMES 'utf8'", MYSQLI_USE_RESULT);
		$query = "SELECT * FROM " . $this->table_name;
		
		if (isset($order) && strlen($order) > 0)
		{
			$query .= " ORDER BY " . $orderBy;
		}
		
		$res = $this->db_conn->query($query, MYSQLI_USE_RESULT);
		
		return $res;
	}
	
	public function getRowsFromQuery($query)
	{
        $this->db_conn->query("SET NAMES 'utf8'", MYSQLI_USE_RESULT);
		$res = $this->db_conn->query($query, MYSQLI_USE_RESULT);
		return $res;
	}
	
	public function getRowById($id)
	{
        $this->db_conn->query("SET NAMES 'utf8'", MYSQLI_USE_RESULT);
		$result = null;
	
		$query = "SELECT * FROM " . $this->table_name . " WHERE " . $this->column_prefix . "ID = " . $id;
		
		$res = $this->db_conn->query($query, MYSQLI_USE_RESULT);
		
		$result = $res;
		
		return $result;
	}
	
	public function delete()
	{
	    if($this->table_name="ARTICLE")
        {
            $this->db_conn->query("DELETE FROM ARTICLE_REVISION_HISTORY WHERE ARTICLE_ID=" . $this->id);
        }
		$this->db_conn->query("DELETE FROM " . $this->table_name . " WHERE " . $this->column_prefix . "ID = " . $this->id);
	}
	
	public function executeQuery($query)
	{
		$this->db_conn->query($query);
	}
	
	public function real_escape_string($characters)
	{
		if ($characters != ""){
			$newCharacters = mysqli_real_escape_string($this->db_conn, $characters);
			return $newCharacters;
		}
	}
}

?>