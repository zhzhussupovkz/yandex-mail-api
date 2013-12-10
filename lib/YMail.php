<?php

/**
* YMail class
* @author zhzhussupovkz@gmail.com
*/

class YMail {

	//api url
	protected $url = 'https://pddimp.yandex.ru';

	//domain token
	protected $domain_token = 'YOUR DOMAIN TOKEN';

	//get data by method
	protected function getRequest($method, $params = array()) {
		$token = array('token' => $this->domain_token);
		$params = array_merge($token, $params);
		$params = http_build_query($params);

		$url = $this->url.'/'.$method.'.xml?'.$params;

		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
		);
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		if ($result == false)
			throw new Exception(curl_error($ch));
		curl_close($ch);

		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$final = json_decode($json, TRUE);
		if (!$final)
			throw new Exception('Получены неверные данные, пожалуйста, убедитесь, что запрашиваемый метод API существует');
		if (isset($final['error'])) {
			return $this->getError($final['error']['@attributes']['reason']);
		} else {
			return $final;
		}
	}

	//send post data
	protected function postRequest($method, $params = array()) {
		$token = array('token' => $this->domain_token);
		$params = array_merge($token, $params);

		foreach ($params as $key => $value) {
			$params[$key] = urlencode($value);
		}

		$options = array(
			CURLOPT_URL => $this->url.'/'.$method.'.xml',
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => 0,
			);

		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$result = curl_exec($ch);
		if ($result == false)
			throw new Exception(curl_error($ch));
		curl_close($ch);
		$xml = simplexml_load_string($result);
		$json = json_encode($xml);
		$final = json_decode($json, TRUE);
		if (!$final)
			throw new Exception('Получены неверные данные, пожалуйста, убедитесь, что запрашиваемый метод API существует');
		if (isset($final['error'])) {
			return $this->getError($final['error']['@attributes']['reason']);
		} else {
			return $final;
		}
	}

	//put request
	protected function putRequest($method, $params = array()) {
		$options = array(
			CURLOPT_URL => $this->url.'/'.$method.'.xml',
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
		if ($result == false)
			throw new Exception(curl_error($ch));
		return $result;
	}

	//get errors by code
	protected function getError($reason) {
		$errors = array(
			'no_params' => 'Не заданы обязательные параметры',
			'no_user' => 'Не существующий пользователь',
			'no token found' => 'Не существующий токен',
		);
		return $errors[$reason];
	}
}