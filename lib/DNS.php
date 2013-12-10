<?php

/**
* DNS class
* @author zhzhussupovkz@gmail.com
*/

class DNS extends YMail {

	//ns api url
	private $url = 'https://pddimp.yandex.ru/nsapi';

	/*
	Метод предназначен для создания A-записей.
	*/
	public function add_a_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_a_record', $params);
	}

	/*
	Метод предназначен для создания AAAA-записей.
	*/
	public function add_aaaa_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_aaaa_record', $params);
	}

	/*
	Метод предназначен для создания CNAME-записей.
	*/
	public function add_cname_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_cname_record', $params);
	}

	/*
	Метод предназначен для создания MX-записей.
	*/
	public function add_mx_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_mx_record', $params);
	}

	/*
	Метод предназначен для создания NS-записей.
	*/
	public function add_ns_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_ns_record', $params);
	}

	/*
	Метод предназначен для создания SRV-записей. 
	*/
	public function add_srv_record($domain_name = null, $weight = null, $port = null, $target = null, $params = array()) {
		if (is_null($domain_name) || is_null($weight) || is_null($port) || is_null($target))
			return $this->getError('no_params');
		$required = array(
			'domain' => $domain_name,
			'weight' => $weight,
			'port' => $port,
			'target' => $target,
			);
		$params = array_merge($required, $params);
		return $this->postRequest('add_srv_record', $params);
	}

	/*
	Метод предназначен для создания TXT-записей.
	*/
	public function add_txt_record($domain_name = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content);
		$params = array_merge($required, $params);
		return $this->postRequest('add_txt_record', $params);
	}

	/*
	Метод предназначен для чтения записей в зоне домена.
	*/
	public function get_domain_records($domain = null) {
		if (is_null($domain))
			return $this->getError('no_params');
		$params = array('domain' => $domain);
		return $this->postRequest('add_txt_record', $params);
	}

	/*
	Метод предназначен для изменения A-записей.
	*/
	public function edit_a_record($domain_name = null, $content = null, $record_id = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_a_record', $params);
	}

	/*
	Метод предназначен для изменения AAAA-записей.
	*/
	public function edit_aaaa_record($domain_name = null, $content = null, $record_id = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_aaaa_record', $params);
	}

	/*
	Метод предназначен для изменения CNAME-записей.
	*/
	public function edit_cname_record($domain_name = null, $content = null, $record_id = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_cname_record', $params);
	}

	/*
	Метод предназначен для изменения MX-записей.
	*/
	public function edit_mx_record($domain_name = null, $content = null, $record_id = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_mx_record', $params);
	}

	/*
	Метод предназначен для изменения NS-записей.
	*/
	public function edit_ns_record($domain_name = null, $content = null, $record_id = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_ns_record', $params);
	}

	/*
	Метод предназначен для изменения SRV-записей.
	*/
	public function edit_srv_record($domain_name = null, $record_id = null, $weight = null, $port = null, $target = null, $params = array()) {
		if (is_null($domain_name) || is_null($weight) || is_null($port) || is_null($target) || is_null($record_id))
			return $this->getError('no_params');
		$required = array(
			'domain' => $domain_name,
			'record_id' => $record_id,
			'weight' => $weight,
			'port' => $port,
			'target' => $target,
			);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_srv_record', $params);
	}


	/*
	Метод предназначен для изменения SOA-записи.
	*/
	public function edit_soa_record($domain_name = null, $params = array()) {
		if (is_null($domain_name))
			return $this->getError('no_params');
		if (!array_key_exists('admin_mail', $params) || !array_key_exists('refresh', $params) || 
			!array_key_exists('retry', $params) || !array_key_exists('expire', $params) ||
			!array_key_exists('neg_cache', $params))
			return $this->getError('no_params');
		$params = array_merge(array('domain' => $domain_name), $params);
		return $this->postRequest('edit_soa_record', $params)
	}

	/*
	Метод предназначен для изменения TXT-записей.
	*/
	public function edit_txt_record($domain_name = null, $record_id = null, $content = null, $params = array()) {
		if (is_null($domain_name) || is_null($content) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain_name, 'content' => $content, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('edit_txt_record', $params);
	}

	/*
	Метод предназначен для удаления записей.
	*/
	public function delete_record($domain = null, $record_id = null) {
		if (is_null($domain_name) || is_null($record_id))
			return $this->getError('no_params');
		$required = array('domain' => $domain, 'record_id' => $record_id);
		$params = array_merge($required, $params);
		return $this->postRequest('delete_record', $params);
	}
}
