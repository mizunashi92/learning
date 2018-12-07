<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learning_model extends CI_Model{

	public function __construct() {

		$this->load->database();

	}

	public function get_all_data($section, $type) {

		if($type === 'video') {
			$tbl = "learning_videos";
		} else {
			$tbl = "learning_files";
		}

		$query = $this->db->get_where($tbl, array('section' => $section));

		return $query->result_array();



	}

}