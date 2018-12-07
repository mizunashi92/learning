<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encryption_code {

	public function hash_generate($plain_text) {

		$options = array('cost' => '10');
		$result =  password_hash($plain_text, PASSWORD_BCRYPT, $options);

		return $result;

	}

	public function hash_verify($plain_text,$hash) {

		if (password_verify($plain_text, $hash)) {

			return TRUE;

		} else {
		
		   return FALSE;

		}
	}
}
