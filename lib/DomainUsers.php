<?php

/**
* class DomainUsers
* @author zhzhussupovkz@gmail.com
*/
class DomainUsers extends YMail {

	/*
	Метод предназначен для регистрации пользователя
	*/
	public function reg_user_token($username, $password) {
		if (is_null($username) || is_null($password))
			return $this->getError('1');
		$params = array('u_login' => $username, 'u_password' => $password);
		return $this->postRequest('reg_user_token', $params);
	}

	/*
	Метод позволяет создать почтовый ящик на неосновном домене.
	*/
	public function reg_user($domain, $username, $password) {
		if (is_null($username) || is_null($password) || is_null($domain))
			return $this->getError('1');
		$params = array('domain' => $domain, 'login' => $username, 'password' => $password);
		return $this->postRequest('reg_user', $params);
	}

	/*
	Метод позволяет получить количество непрочитанных писем.
	*/
	public function get_mail_info($username) {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username);
		return $this->getRequest('get_mail_info', $params);
	}

	/*
	Метод позволяет получить данные пользователя.
	*/
	public function get_user_info($username) {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username);
		return $this->getRequest('get_user_info', $params);
	}

	/*
	Метод предназначен для редактирования данных пользователя.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/domain-users_edit_user.xml
	*/
	public function edit_user($username, $params = array()) {
		if (is_null($username))
			return $this->getError('1');
		$username = array('login' => $username);
		$params = array_merge($username, $params);
		return $this->postRequest('get_user_info', $params);
	}

	/*
	Метод позволяет установить переадресацию для заданного пользователя.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/domain-users_set_forward.xml
	*/
	public function set_forward($username, $address, $copy = 'yes') {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username,'address' => $address, 'copy' => $copy);
		return $this->postRequest('set_forward', $params);
	}

	/*
	Метод позволяет получить список переадресаций и фильтров.
	*/
	public function get_forward_list($username) {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username);
		return $this->getRequest('get_forward_list', $params);
	}

	/*
	Метод позволяет удалить переадресацию или фильтр.
	*/
	public function delete_forward($username, $filter_id) {
		if (is_null($username) || is_null($filter_id))
			return $this->getError('1');
		$params = array('login' => $username, 'filter_id' => $filter_id);
		return $this->getRequest('delete_forward', $params);
	}

	/*
	Метод предназначен для удаления пользователя.
	*/
	public function delete_user($username) {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username);
		return $this->getRequest('delete_user', $params);
	}

	/*
	Метод позволяет удалить почтовый ящик в неосновном домене.
	*/
	public function del_user($domain, $username) {
		if (is_null($username) || is_null($domain))
			return $this->getError('1');
		$params = array('login' => $username, 'domain' => $domain);
		return $this->getRequest('del_user', $params);
	}
}