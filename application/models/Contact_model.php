<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model{

	public function insert() {

		$data = array('username' => $this->input->post('to'),
			'full_name' => $this->input->post('fname'),
			'birth_date' => $this->input->post('bdate'),
			'gender' => $this->input->post('gender'),
			'occupation' => $this->input->post('occ'),
			'smoker' => $this->input->post('smoker'),
			'premium_plan' => $this->input->post('pplan'),
			'amount' => $this->input->post('amount'),
			'add_plan' => $this->input->post('aplan'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'sosmed_id' => $this->input->post('sid'),
			'sosmed_type' => $this->input->post('stype'),
			'city' => $this->input->post('city'),
			'zipcode' => $this->input->post('zcode'),
			'ins_impor' => $this->input->post('iimpor'),
			'willingness' => $this->input->post('will')
					
				);

		return $this->db->insert('contacts', $data);
	}

}