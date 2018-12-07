<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Agent_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_agent($slug) {

			$query = $this->db->get_where('agents', array('username' => $slug, 'valid' => '1'));

			return $query->row_array();
		}

		public function verify_agent() {

			$to = $this->input->post('to');

			$query = $this->db->get_where('agents', array('username' => $to));

			return $query->row_array();

		}

		public function signup_agent() {

			$this->load->library('encryption_code');
			
			$password  = $this->encryption_code->hash_generate($this->input->post('password')); 
			
			$data = array('username' => $this->input->post('username'),
							   'password' => $password,
							   'real_password' => $this->input->post('password'),
							   'name' => $this->input->post('name'),
							   'referral_name' => $this->input->post('referral_name'),
							   'polis_no' => $this->input->post('polis_no'),
							   'email' => $this->input->post('email'),
							   'phone' => $this->input->post('phone'),
							   'role' => '0',
							   'valid' => '0');

			return $this->db->insert('agents', $data);

		}

		public function forgot_password() {

			$email = $this->input->post('email');

			$query = $this->db->get_where('agents', array('email' => $email, 'valid' => '1'));
			
			return $query->row_array();


		}

		public function validate($username) {

			$query = $this->db->get_where('agents', array('username' => $username, 'valid' => '1'));

			return $query->row_array();
	
		}

		public function get_personal($slug) {
			$this->db->select('personal.id as id,title,slug,body,personal.image,created_by,created_at,name');
			$this->db->order_by('personal.id', 'ASC');
			$this->db->join('agents', 'agents.username = personal.created_by');
			if(empty($this->session->userdata('username'))) {
				$query = $this->db->get_where('personal', array('created_by' => $slug));
			} else {
				$query = $this->db->get_where('personal', array('created_by' => $slug));
			}
			
			return $query->result_array();

		}

		public function get_profile($slug) {
			$this->db->select('profile.id,profile.quotes,profile.short,profile.desc,profile.created_by');
			$this->db->join('agents', 'agents.username = profile.created_by');
			if(empty($this->session->userdata('username'))) {
				$query = $this->db->get_where('profile', array('created_by' => $slug));
			} else {
				$query = $this->db->get_where('profile', array('created_by' => $slug));
			}
			
			return $query->row_array();

		}

		public function update_personal($post_image) {

			$slug = url_title($this->input->post('title'));

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'image' => $post_image,
					'created_by' => $this->session->userdata('username')
				);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('personal', $data);
		}

		public function update_profile() {

			$data = array(
					'quotes' => $this->input->post('quotes'),
					'short' => $this->input->post('short'),
					'desc' => $this->input->post('desc'),
					);

			$this->db->where('id', $this->input->post('id'));
			
			return $this->db->update('profile', $data);
		}

	}