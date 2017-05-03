<?php
/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/

namespace Database\DBConnection;

use \PDO;

/*
* In sqlite database type, provide the path of the database file and provide also set the $db_type to sqlite
* In mysql database type, the host,dbname,username,password are mandatory 
*/

class DBConnection {

	public static $db;
	public static $host="";
	public static $dbname="";
	public static $username="";
	public static $password="";
	public static $db_type = 'sqlite'; //available options -> sqlite,mysql for the meantime
	public static $charset = "utf8mb4";
	public static $dsn = "sqlite:".ROOT_DIR."blogdb/bluecloudblog.db";
	public static $pdo_opt = array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

}
