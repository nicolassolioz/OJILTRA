<?php
session_start();
error_reporting(0);

/*
if($_SESSION["loggedIn"] != true)
{
    echo("Access denied!");
    header("location:index.html");
	exit();
}
*/

require_once("config.php");
require_once("model/ConnectionManager.php");
require_once("model/Entity.php");
require_once("model/User.php");

if (isset($_POST['email']) && isset($_POST['pass'])){
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$userId = User::checkLoginInfo($email, $password);
	
	if ($userId > 0){
		$_SESSION["loggedIn"] = true;
		$_SESSION["userid"] = $userId;

		$roleId = User::getRolebyUserId($userId);

		if($roleId == 1){
			//Journalist
			header("Location: articles.php");
		}else if($roleId == 2){
			//Editor
			header("Location: label_distribution.php");
		}
	}else{
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Email or Password is invalid');\n";
		echo "window.location='login.php'";
		echo "</script>";
	}

}



?>

