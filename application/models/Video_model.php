<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Video_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_video() {

			$query = $this->db->get('videos');

			return $query->row_array();

		}
		public function update_video() {

			$data = array(
					'title' => $this->input->post('title'),
					'url' => $this->input->post('url'),
					'created_by' => 'Lindsay Sterling'
				);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('videos', $data);
		}
	}