<?php
class Database{
  //Подключение к серверу
	public static function getConnection()
	{
		$config = include 'config.php';

		$dsn = "mysql:host={$config['host']};dbname={$config['db_name']}";

		$db = new PDO($dsn,$config['username'],$config['password']);
		$db->exec("set names utf8");
		return $db;
	}	
}
?>