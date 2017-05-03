<?php

/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/

/*
* Default Generic Function of BlueCloud
* Do not delete this file or modify the contents of it unless you know what you are doing!
*/

function base_url(){

	$host = $_SERVER['HTTP_HOST'];

 	$urlparts = explode('/', $_SERVER['PHP_SELF']);

	if(strpos($host, 'localhost')===FALSE){

		if(is_ssl()){

			 return 'https://'.$_SERVER['HTTP_HOST'].'/';

		}else{

			return 'http://'.$_SERVER['HTTP_HOST'].'/';
		}

	}else{

		return 'http://'.$_SERVER['SERVER_NAME'].'/'.$urlparts[1].'/';
			
	}

}

function is_ssl(){

	return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? TRUE : FALSE;
}


function  get_data($method,$index){

	if(strtoupper($method)==='POST'){
		if(isset($_POST[$index])){
			
			return $_POST[$index];
		}
	}else if(strtoupper($method)==='GET'){
		if(isset($_GET[$index])){
			
			return $_GET[$index];
		}
	}
}

function create_url_title($str, $separator = '-', $lowercase = FALSE){
	
	if ($separator === 'dash'){

		$separator = '-';
	}

	elseif ($separator === 'underscore'){
		$separator = '_';
	}

	$q_separator = preg_quote($separator, '#');

	$trans = array(
		'&.+?;'			=> '',
		'[^\w\d _-]'		=> '',
		'\s+'			=> $separator,
		'('.$q_separator.')+'	=> $separator
	);

	$str = strip_tags($str);
	foreach ($trans as $key => $val){

		$str = preg_replace('#'.$key.'#i'.'', $val, $str);
	}

	if ($lowercase === TRUE){
		$str = strtolower($str);
	}

	return trim(trim($str, $separator));
}


function create_token(){

	if(function_exists('mcrypt_create_iv')){

		$token = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));

	}else{
		
		$token = bin2hex(openssl_random_pseudo_bytes(32));	
	}
	

	set_session('csrf_token',$token);

	return $token;

}


function is_token_valid(){

   if(get_data('post','csrf_token') === get_sessiondata('csrf_token')){
   		
   		return TRUE;

   }else{
   		
   		return FALSE;
   }

 }


function  html_ent($string,$flags='ENT_QUOTES|ENT_HTML5',$charset='UTF-8',$doub_enc=NULL){

	return htmlentities($string,$flags,$charset,$doub_enc);
}

function  hspec_chars($string,$ent=ENT_QUOTES,$encoding='UTF-8'){

	return htmlspecialchars($string,$ent,$encoding);
}


function  redirect($location,$replace=TRUE,$response_code=302){

	header('location:'.$location,$replace,$response_code);

	exit;
}


function  get_flashdata($key){

	if(isset($_SESSION['coffee_flash_data'][$key])){

		 $flashdata = $_SESSION['coffee_flash_data'][$key];
		 unset($_SESSION['coffee_flash_data'][$key]);
		 return $flashdata;
	}
}


function  get_sessiondata($key){

	if(isset($_SESSION[$key])){

		return $_SESSION[$key];
	}

}


function set_session($sessiondata,$value=NULL){

	if(is_array($sessiondata)){

		foreach($sessiondata as $sess_data=>$key){

			$_SESSION[$sess_data] = $key;
		}

	}else{


		if((is_string($sessiondata) && strlen($sessiondata)!==NULL) && $value!==NULL){

			$_SESSION[$sessiondata] = $value;
		}

	}
}


function  set_flashdata($key,$data){

	if($key!=='' && $data!==''){

		unset($_SESSION['coffee_flash_data']);
		$_SESSION['coffee_flash_data'][$key] = $data;

	}
}


function  unset_userdata($key){
	
	if(isset($_SESSION[$key])){
		
		unset($_SESSION[$key]);
	}
}

function  cache_form_values($form_name='form_values'){

if (!empty($_POST) && req_method()==="POST" ) {

    foreach($_POST as $key => $value) {

    		$_SESSION[$form_name][$key] = $value;	
        
    	}

	}else{

	}
}



function  clear_form_cache($form_name='form_values'){

	if(isset($_SESSION['form_values'])){

		foreach(array_keys($_SESSION['form_values']) as $keys){

				unset($_SESSION['form_values'][$keys]);
		}

	}

}


function  current_url(){

	if(isset($_SERVER['HTTPS'])){
	
		return 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	

	}else{

		return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];	
	}
}



function exectime(){

	return number_format((float)(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]), 4, '.', '');
}


function  get_url_segment($segment){

	$parts = explode("/", current_url());

	if(!empty($parts[$segment])){
		return $parts[$segment];	
	}
	
}


function  get_file_data($file,$index=NULL){
	if(isset($_FILES[$file])){
		$file_attributes = array('name','type','tmp_name','error','size');
		if($index!==NULL){

		if(in_array($index, $file_attributes)){
			return $_FILES[$file][$index];
		}

		}else{
			return $_FILES[$file];
		}
	}
}


function  is_ajax(){

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
		return TRUE;
	}else{
		return FALSE;
	}
}




function  prev_field_value($field){

	if(isset($_SESSION['form_values'][$field])){

		return $_SESSION['form_values'][$field];
	}else{

		return '';
	}
}



function  random_string($type = 'alnum', $len = 8){

	switch ($type){

			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($pool, ceil($len / strlen($pool)))), 0, $len);
			case 'unique':
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt':
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
	}
}


function req_method(){

	return $_SERVER['REQUEST_METHOD'];
}



function get_sessionId(){
	
	return session_id();
}


function regenerate_sessionId(){

    session_regenerate_id(TRUE);
    return session_id();

}

function store_last_postdata($referer_url){

	if(strlen($referer_url)!==0){

		if(req_method()==="POST" && !empty($_POST) && is_ajax()==FALSE){

			unset($_SESSION[$referer_url]);

				 foreach($_POST as $key => $value) {

					$_SESSION[$referer_url][$key] = $value;
			}

		}

	}
}



function old_value($field_name){

	$currentUrl  = current_url();

	if(isset($_SESSION[$currentUrl][$field_name])){

		$old_val =  $_SESSION[$currentUrl][$field_name];

		unset($_SESSION[$currentUrl][$field_name]);

		return $old_val;


	}else{

		return '';

	}

}

store_last_postdata(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');

