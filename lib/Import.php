<?php

/**
* Import class
* @author zhzhussupovkz@gmail.com
*/

class Import extends YMail {

	/*
	Метод позволяет сохранить настройки импорта для домена.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/import_set_domain.xml
	*/
	public function set_domain($method = null, $ext_serv = null, $params = array()) {
		if (is_null($method) || is_null($ext_serv))
			return $this->getError('no_params');
		$required = array('method' => $method, 'ext_serv' => $ext_serv);
		$params = array_merge($required, $params);
		return $this->postRequest('set_domain', $params);
	}

	/*
	Метод предназначен для запуска импорта почтового ящика.
	*/
	public function start_import($login = null, $password = null, $params = array()) {
		if (is_null($login) || is_null($password))
			return $this->getError('no_params');
		$required = array('login' => $login, 'password' => $password);
		$params = array_merge($required, $params);
		return $this->getRequest('start_import', $params);
	}

	/*
	Метод позволяет проверить состояние импорта почты.
	*/
	public function check_import($login = null) {
		if (is_null($login))
			return $this->getError('no_params');
		$params = array('login' => $login);
		return $this->getRequest('check_import', $params);
	}

	/*
	Метод предназначен для остановки импорта почтового ящика.
	*/
	public function stop_import($login = null) {
		if (is_null($login))
			return $this->getError('no_params');
		$params = array('login' => $login);
		return $this->getRequest('stop_import', $params);
	}

	/*
	Метод позволяет зарегистрировать пользователя 
	и запустить импорт его почты.
	*/
	public function reg_and_imp($login = null, $inn_pass = null, $ext_pass = null, $params = array()) {
		if (is_null($login) || is_null($inn_pass) || is_null($ext_pass))
			return $this->getError('no_params');
		$required = array('login' => $login, 'inn_password' => $inn_pass,'ext_password' => $ext_pass);
		$params = array_merge($required, $params);
		return $this->postRequest('reg_and_imp', $params);
	}

	/*
	Метод позволяет запустить импорт одной папки по IMAP.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/import_import_imap.xml
	*/
	public function import_imap($login = null, $ext_pass = null, $params = array()) {
		if (is_null($login) || is_null($ext_pass))
			return $this->getError('no_params');
		$required = array('login' => $login, 'ext_password' => $ext_pass);
		$params = array_merge($required, $params);
		return $this->getRequest('import_imap', $params);
	}
}