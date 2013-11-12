<?php

//Config class
class Config {

	//параметры
	private static $params = array();

	//set params
	public static function setParams($key, $value) {
		self::$params[$key] = $value;
	}

	//get params
	public static function getParams($key) {
		return self::$params[$key];
	}
}

//configurate
$params = array(
	'token' => 'YOUR_TOKEN',
	);

Config::setParams('main', $params);