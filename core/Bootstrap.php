<?php

/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/

use Router\Router;
use Routes\Routes;

class Bootstrap {

	public function __construct(){
		
		self::loadControllers();
		self::loadGenericFunctions();
		self::loadHTMLPurifier();

	}

	private  static function loadControllers(){

		foreach(glob(ROOT_DIR.'controllers/*.php') as $controllers){

			require_once $controllers;
		}
	}

	private  static function loadGenericFunctions(){

		foreach(glob(ROOT_DIR.'generic_functions/*.php') as $gen_func){

			require_once $gen_func;
		}
	}

	private static function loadHTMLPurifier(){

		require_once ROOT_DIR.'core/HTMLPurifier/HTMLPurifier.auto.php';
	}


	public static function runApp(){

		$url		= '';
		$method		='';
		$callback	='';

		foreach(Routes::routeList() as $route_rules):

			$method = 	explode('|',$route_rules)[0];
			$url = 		explode('|', $route_rules)[1];
			$callback = explode('|', $route_rules)[2];

			if($method === "GET"){

				Router::get($url,$callback);


			}else if($method === "POST"){

				Router::post($url,$callback);
			}

		endforeach;

	Router::dispatch();

	}

}