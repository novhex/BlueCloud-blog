<?php
/*
* BlueCloud PHP MVC
* Bluecloud is a simple PHP MVC app made using PHP
* MIT Licensed Project
* Copyright (c) 2017 Vhexzhen Lei
* vhexzhenlei.tk
*/

namespace Helpers;

class Encryption_helpers{

	private static $secret_key = 'T4xY0{6fyG31}!5ah|43k>?d_Q0662q%@+';
	private static $secret_iv = '!#)(@*!^#%1Ab0Zid84023iJfpdDlXm';
	private static $hashedKey;
	private static $hashedIV;


	public static function encryptString($str){

		self::initKeys();
		return base64_encode(openssl_encrypt($str, 'AES-256-CBC', self::$hashedKey,0,self::$hashedIV));
	}

	public static function decryptString($encryptedString){

		self::initKeys();
		return openssl_decrypt(base64_decode($encryptedString), 'AES-256-CBC', self::$hashedKey,0,self::$hashedIV);
	}


	private static function initKeys(){

		self::$hashedKey = hash('sha512', self::$secret_key);
		self::$hashedIV =substr(hash('sha512',self::$secret_iv), 0,16);
	}
}