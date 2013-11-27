<?php

/**
* Auth class
* @author zhzhussupovkz@gmail.com
*/

class Auth extends YMail {

	//callback url
	private $callback;

	/*
	Метод позволяет установить авторизационный URL-колбэк.
	*/
	private function set_mail_callback($domain, $callback) {
		if (is_null($domain) || is_null($callback))
			return $this->getError('no_params');
		$params = array('domain' => $domain, 'callback' => $callback);
		$this->callback = $callback;
		return $this->postRequest('set_mail_callback', $params);
	}

	/*
	Метод позволяет получить короткоживущий токен для авторизации.
	*/
	private function user_oauth_token($domain, $login) {
		if (is_null($domain) || is_null($login))
			return $this->getError('no_params');
		$params = array('domain' => $domain, 'login' => $login);
		return $this->postRequest('user_oauth_token', $params);
	}

	/*
	Метод позволяет авторизоваться по короткоживущему токену.
	*/
	private function passport() {
		$url = 'https://passport.yandex.ru/passport?mode=oauth&type=trusted-pdd-partner';
		$token = $this->user_oauth_token();
		$params = array('access_token' => $token, 'error_retpath' => $this->callback);
		$params = http_build_query($params);
		$url = $url.'&'.$params;

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

	/*
	Авторизация
	*/
	public function authorization($domain, $callback) {
		$this->set_mail_callback($domain, $callback);
		return $this->passport();
	}
}