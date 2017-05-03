<?php
/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/

namespace Core\Controller;

use \Database\DBConnection\DBConnection as DB;


class Controller{

	public $ORM;

	public function __construct(){

		try{

			if(DB::$dsn!=='' || DB::$host!==''){


				if(DB::$db_type=='mysql'){

					$this->ORM = new \FluentPDO(new \PDO("mysql:host=".DB::$host.";dbname=".DB::$dbname.";charset=".DB::$charset, DB::$username, DB::$password,DB::$pdo_opt));	

				}else if(DB::$db_type=='sqlite'){

					if(DB::$dsn!==''){
						$this->ORM = new \FluentPDO(new \PDO(DB::$dsn));
					}else{
						
						echo "<div style='color:red;'>Please specify your DSN connection string.</div>";
					}

				}else{

						echo "<div style='color:red;'>Please select database driver.</div>";
				}

			}

		}catch(PDOException $e){

			echo($e->getMessage());
		}
		
		
	}

}