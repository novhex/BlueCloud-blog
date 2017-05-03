<?php

namespace Routes;


class Routes {

	private static $routes = array
	(
	
	'GET|/|Controllers\home@index',
	'GET|/blog/write-blog|Controllers\home@write_blog',
	'GET|/blog/edit-blog/(:slug)|Controllers\home@edit_blog',
	'GET|/blog/delete-blog/(:slug)|Controllers\home@delete_blog',
	'POST|/blog/save-blog|Controllers\home@save_blog',
	'POST|/blog/update-blog|Controllers\home@update_blog'
	);

	

	public static function routeList(){

		return self::$routes;
	}

}

