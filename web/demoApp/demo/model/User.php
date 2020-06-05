<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05

class User extends Entity
{
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $role_id;
	public $company_id;
	
	public function __construct()
	{
		parent::__construct("USER", "USER_");
	}

	public static function getUserById($id)
	{
	
		$entity = new User();
		$res = $entity->getRowsFromQuery("SELECT * FROM USER WHERE USER_ID = '" . $id ."'");
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			
			$user = new User();
			$user->id = $row['USER_ID'];
			$user->firstname = $row['USER_FIRSTNAME'];
			$user->lastname = $row['USER_LASTNAME'];
			$user->email = $row['USER_EMAIL'];
			$user->role_id = $row['ROLE_ID'];
			$user->company_id = $row['COMPANY_ID'];
			
		$res->close();
		}
		
		return $user ;
	}

	public static function checkLoginInfo($login, $pass)
	{
	
		$userId = 0;

		$entity = new User();
		$res = $entity->getRowsFromQuery("SELECT * FROM USER WHERE USER_EMAIL = '" . $login ."' AND USER_PASSWORD = '" . $pass . "'");
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			$userId = $row['USER_ID'];
			
			$res->close();
		}
		//console.log("userid: ".$userId);
		return $userId ;
	}

	public static function getRolebyUserId($userId)
	{
	
		$roleId = 0;
		$entity = new User();
		$res = $entity->getRowsFromQuery("SELECT ROLE_ID FROM USER WHERE USER_ID = '" . $userId ."'");
		
		if ($res != null)
		{
			$row = $res->fetch_assoc();
			$roleId = $row['ROLE_ID'];
			
			$res->close();
		}
		
		return $roleId ;
	}
	
}

?>