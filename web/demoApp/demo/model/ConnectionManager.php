<?php

// Authors: 	Zhan Liu
// Created: 	2020/05/05
// Last update:	2020/05/05

class ConnectionManager
{
	private static $db_conn;

	// Get or create a DB connection:
	public static function getConnection()
	{
		if (ConnectionManager::$db_conn == null)
		{
			ConnectionManager::$db_conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
		}
                mysqli_set_charset(ConnectionManager::$db_conn, "utf8m");

		return ConnectionManager::$db_conn;
	}
	// Close the existing DB connection:
	public static function closeConnection()
	{
		if (ConnectionManager::$db_conn != null)
		{
			mysqli_close(ConnectionManager::$db_conn);
		}
	}
}

?>