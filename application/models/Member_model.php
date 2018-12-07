<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {

	public function get_profile() {

		$agent = $this->db->get_where('agents',array('id' => $_SESSION['id']));

		return $agent->row_array();

	}

	public function update_profile($post_image) {

		$data = array(
					'name' => $this->input->post('name'),
					'referral_name' => $this->input->post('referral_name'),
					'polis_no' => $this->input->post('polis_no'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
						'url' => $this->input->post('url'),
					'image' => $post_image
				);

		$this->db->where('id', $_SESSION['id']);
		
		return $this->db->update('agents', $data);

	}

	public function update_password() {

		$this->load->library('encryption_code');
		$password  = $this->encryption_code->hash_generate($this->input->post('password')); 

		$data = array(
					'password' => $password,
					'real_password' => $this->input->post('password')
				);

		$this->db->where('id', $_SESSION['id']);
		
		return $this->db->update('agents', $data);		
	
	}

}