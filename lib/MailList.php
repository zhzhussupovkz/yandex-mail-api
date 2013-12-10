<?php

/**
* MailList class
* @author zhzhussupovkz@gmail.com
*/

class MailList extends YMail {

	/*
	Метод позволяет создать общий список рассылки домена,
	включающий всех пользователей домена.
	*/
	public function create_general_maillist($domain = null, $ml_name = null) {
		if (is_null($domain) || is_null($ml_name))
			return $this->getError('no_params');
		$params = array('domain' => $domain, 'ml_name' => $ml_name);
		return $this->postRequest('create_general_maillist', $params);
	}

	/*
	Метод позволяет удалить общий список рассылки домена,
	включающий всех пользователей домена.
	*/
	public function delete_general_maillist($domain = null) {
		if (is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain);
		return $this->postRequest('delete_general_maillist', $params);
	}

}