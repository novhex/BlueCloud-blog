<?php
/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/
namespace View;

class View {

	private static $vars 		= array();
	private static $pageVars 	= array();

	public function __construct(){

	}

	public static function show($view,$vars=[],$http_headers = array()){



		if($vars != NULL) {

			foreach ($vars as $key => $value) 
			{
				self::$pageVars[$key] = $value;
			}
		}
		

		if(file_exists(ROOT_DIR .'views/'. $view .'.php')){

			if(sizeof($http_headers)>=1){

				foreach($http_headers as $header_keys =>$header_vals){

					header($header_keys.':'.$header_vals);
				}
			}



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