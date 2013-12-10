<?php

/**
* DKIM class
* @author zhzhussupovkz@gmail.com
*/

class DKIM extends YMail {

	/*
	Метод позволяет включить использование DKIM для домена.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/dkim_set_domain.xml#dkim_set_domain
	*/
	public function enable($domain = null) {
		if (is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain);
		return $this->getRequest('dkim/enable', $params);
	}

	/*
	Метод предназначен для проверки статуса DKIM для домена.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/dkim_start_import.xml
	*/
	public function status($domain = null) {
		if (is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain);
		return $this->getRequest('dkim/status', $params);
	}

	/*
	Метод позволяет отключить использование DKIM для домена.
	Подробнее: http://api.yandex.ru/pdd/doc/reference/dkim_set_domain.xml#dkim_set_domain
	*/
	public function disable($domain) {
		if (is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain);
		return $this->getRequest('dkim/disable', $params);
	}

}
