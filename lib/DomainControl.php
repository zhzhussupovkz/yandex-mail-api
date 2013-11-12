<?php

/**
* class DomainUsers
* @author zhzhussupovkz@gmail.com
*/
class DomainControl {

	/*
	Метод позволяет подключить домен.
	*/
	public function reg_domain($domain_name) {
		if (is_null($domain_name))
			return $this->getError('1');
		$params = array('domain' => $domain_name);
		return $this->postRequest('reg_domain', $params);
	}

	/*
	Метод позволяет задать почтовый ящик по умолчанию для домена.
	*/
	public function reg_default_user($domain, $username) {
		if (is_null($domain) || is_null($username))
			return $this->getError('1');
		$params = array('domain' => $domain, 'login' => $username);
		return $this->postRequest('reg_default_user', $params);
	}

	/*
	Метод позволяет отключить домен.
	*/
	public function del_domain($domain) {
		if (is_null($domain))
			return $this->getError('1');
		$params = array('domain' => $domain);
		return $this->getRequest('del_domain', $params);
	}

	/*
	Метод позволяет добавить логотип домену.
	*/
	public function add_logo($domain, $filename) {
		if (is_null($domain))
			return $this->getError('1');
		$params = array('domain' => $domain);
		return $this->postRequest('add_logo', $params);
	}

	/*
	Метод позволяет удалить логотип домена.
	*/
	public function del_logo($domain) {
		if (is_null($domain))
			return $this->getError('1');
		$params = array('domain' => $domain);
		return $this->getRequest('del_logo', $params);
	}

	/*
	Метод позволяет получить список почтовых ящиков.
	*/
	public function get_domain_users($on_page, $page = '1') {
		if (is_null($on_page))
			return $this->getError('1');
		$params = array('on_page' => $on_page);
		return $this->getRequest('get_domain_users', $params);
	}

	/*
	Метод позволяет проверить существование пользователя.
	*/
	public function check_user($username) {
		if (is_null($username))
			return $this->getError('1');
		$params = array('login' => $username);
		return $this->getRequest('check_user', $params);
	}

	/*
	Метод позволяет добавить дополнительного администратора домена.
	*/
	public function add_admin($domain, $username) {
		if (is_null($username) || is_null($domain))
			return $this->getError('1');
		$params = array('login' => $username, 'domain' => $domain);
		return $this->postRequest('add_admin', $params);
	}

	/*
	Метод позволяет удалить дополнительного администратора для домена.
	*/
	public function del_admin($domain, $username) {
		if (is_null($username) || is_null($domain))
			return $this->getError('1');
		$params = array('login' => $username, 'domain' => $domain);
		return $this->postRequest('del_admin', $params);
	}

	/*
	Метод позволяет получить список дополнительных администраторов домена.
	*/
	public function get_admins($domain) {
		if (is_null($domain))
			return $this->getError('1');
		$params = array('domain' => $domain);
		return $this->postRequest('get_admins', $params);
	}

}