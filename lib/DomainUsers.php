<?php

/**
* class DomainUsers
* @author zhzhussupovkz@gmail.com
*/

class DomainUsers extends YMail {

	/*
	Метод предназначен для регистрации пользователя
	*/
	public function reg_user_token($username = null, $password = null) {
		if (is_null($username) || is_null($password))
			return $this->getError('no_params');
		$params = array('u_login' => $username, 'u_password' => $password);
		return $this->postRequest('reg_user_token', $params);
	}

	/*
	Метод позволяет создать почтовый ящик на неосновном домене.
	*/
	public function reg_user($domain = null, $username = null, $password = null) {
		if (is_null($username) || is_null($password) || is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain, 'login' => $username, 'password' => $password);
		return $this->postRequest('reg_user', $params);
	}

	/*
	Метод позволяет создать пользователя с зашифрованным паролем.
	*/
	public function reg_user_crypto($username = null, $password = null) {
		if (is_null($username) || is_null($password))
			return $this->getError('no_params');
		$rand = $this->generate_random(22);
		$password = md5("1$1".$password."$".$rand);
		$params = array('login' => $username, 'password' => $password);
		return $this->postRequest('reg_user_crypto', $params);
	}

	/*
	Генерирует случайную строку из len символов [a-zA-Z0-9./]
	*/
	private function generate_random($len = 8) {
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$str = '';
		for ($i=0; $i < $len; $i++) {
			$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $str;
	}

	/*
	Метод позволяет получить количество непрочитанных писем.
	*/
	public function get_mail_info($username = null) {
		if (is_null($username))
			return $this->getError('no_params');
		$params = array('login' => $username);
		return $this->getRequest('get_mail_info', $params);
	}

	/*
	Метод позволяет получить данные пользователя.
	*/
	public function get_user_info($username = null) {
		if (is_null($username))
			return $this->getError('no_params');
		$params = array('login' => $username);
		return $this->getRequest('get_user_info', $params);
	}

	/*
	Метод предназначен для редактирования данных пользователя.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/domain-users_edit_user.xml
	*/
	public function edit_user($username = null, $params = array()) {
		if (is_null($username))
			return $this->getError('no_params');
		$username = array('login' => $username);
		$params = array_merge($username, $params);
		return $this->postRequest('get_user_info', $params);
	}

	/*
	Метод позволяет установить переадресацию для заданного пользователя.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/domain-users_set_forward.xml
	*/
	public function set_forward($username = null, $address = null, $copy = 'yes') {
		if (is_null($username))
			return $this->getError('no_params');
		$params = array('login' => $username,'address' => $address, 'copy' => $copy);
		return $this->postRequest('set_forward', $params);
	}

	/*
	Метод позволяет получить список переадресаций и фильтров.
	*/
	public function get_forward_list($username = null) {
		if (is_null($username))
			return $this->getError('no_params');
		$params = array('login' => $username);
		return $this->getRequest('get_forward_list', $params);
	}

	/*
	Метод позволяет удалить переадресацию или фильтр.
	*/
	public function delete_forward($username = null, $filter_id = null) {
		if (is_null($username) || is_null($filter_id))
			return $this->getError('no_params');
		$params = array('login' => $username, 'filter_id' => $filter_id);
		return $this->getRequest('delete_forward', $params);
	}

	/*
	Метод предназначен для удаления пользователя.
	*/
	public function delete_user($username = null) {
		if (is_null($username))
			return $this->getError('no_params');
		$params = array('login' => $username);
		return $this->getRequest('delete_user', $params);
	}

	/*
	Метод позволяет удалить почтовый ящик в неосновном домене.
	*/
	public function del_user($domain = null, $username = null) {
		if (is_null($username) || is_null($domain))
			return $this->getError('no_params');
		$params = array('login' => $username, 'domain' => $domain);
		return $this->getRequest('del_user', $params);
	}
}
