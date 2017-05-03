<?php
/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/
namespace Core\View;

class View {

	private static $vars 		= array();
	private static $pageVars 	= array();

	public function __construct(){

	}

	public static function show($view,$vars=[]){

		if($vars != NULL) {

			foreach ($vars as $key => $value) 
			{
				self::$pageVars[$key] = $value;
			}
		}

		if(file_exists(ROOT_DIR .'views/'. $view .'.php')){


			extract(self::$pageVars);
			ob_start();
			require_once(ROOT_DIR .'views/'. $view .'.php');
			echo ob_get_clean();

		}else{
			 
            die('View file : '.'views/'. $view .'.php was not found');
			exit();

		}
	
	}
}