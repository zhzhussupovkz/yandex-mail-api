<?php
/**
* class Base
* @author zhzhussupovkz@gmail.com
*/
class Base {

	//api url
	protected $url = 'https://pddimp.yandex.ru';

	//domain token
	protected $domain_token;

	//constructor
	public function __construct() {
		$params = Config::getParams('main');
		$this->domain_token = $params['token'];
	}

	//get data by method
	protected function getRequest($method, $params = array()) {
		$params = array_merge($user, $params);
		$params = http_build_query($params);

		$url = $this->apiUrl.'?method='.$method.'&'.$params.'&format=xml';

		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
		);
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		curl_close($ch);

		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$final = json_decode($json, TRUE);
		if (isset($final['error'])) {
			return 'Error!';
		} else {
			return $final;
		}
	}

	//send post data
	protected function postRequest($method, $params) {
		$token = array('token' => $this->token);
		$params = array_merge($token, $params);

		foreach ($params as $key => $value) {
			$params[$key] = urlencode($value);
		}

		$options = array(
			CURLOPT_URL => $this->apiUrl.'/'.$method.'.xml',
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
			);

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		curl_close($ch);
		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$final = json_decode($json, TRUE);
		if (isset($final['error'])) {
			return 'Error!';
		} else {
			return $final;
		}
	}

	protected function putRequest($method, $params) {
		$options = array(
			CURLOPT_URL => $this->apiUrl.'/'.$method.'.xml',
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_VERBOSE => true,
			CURLOPT_CUSTOMREQUEST => "PUT",
			);

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	//get errors by code
	protected function getError($code) {
		$errors = array(
			'1' => 'Не заданы обязательные параметры',
		);
		return $errors[$code];
	}
}