<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index($section) {
		
		$data['videos'] = $this->Learning_model->get_all_data($section,'video');
		
		$this->load->view('partials/_header');
		$this->load->view('pages/videos', $data);
		$this->load->view('partials/_footer');

	}
}
