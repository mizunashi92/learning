<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_users($id = FALSE) {

			if($id === FALSE) {

				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('agents');
				return $query->result_array();

			}

			$query = $this->db->get_where('agents', array('id' => $id));

			return $query->row_array();
		}

		public function get_profile($id) {

			$agent = $this->db->get_where('agents',array('id' => $id));

			return $agent->row_array();

		}	
		
		public function get_user_verify($username) {

			$query = $this->db->get_where('agents', array('username' => $username, 'valid' => '1'));
			
			return $query->row_array();
		}

		public function accept_users($username) {
            $now = date('Y-m-d');
            $exp = date('Y-m-d', strtotime('+1 year', strtotime($now)));
			$personal = array('created_by' => $username);
			$this->db->insert('personal',$personal);
			$this->db->insert('personal',$personal);
			$this->db->insert('profile',$personal);
			
			$data = array(
					'valid' => '1',
					'valid_until' => $exp
				);

			$this->db->where('username', $username);
			return $this->db->update('agents', $data);
		}
		
		public function deactive_users($username) {
            $now = date('Y-m-d');
            
			$data = array(
					'valid' => '0',
					'valid_until' => $now
				);

			$this->db->where('username', $username);
			return $this->db->update('agents', $data);
		}
		
		public function reject_users($id) {

			$this->db->where('id', $id);
			$this->db->delete('agents');

			return true;

		}

	}