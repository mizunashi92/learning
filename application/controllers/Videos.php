<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index($section) {
		
		$data['videos_a'] = $this->Learning_model->get_all_videos_section($section);
		
		$this->load->view('partials/_header');
		$this->load->view('pages/videos', $data);
		$this->load->view('partials/_footer');

	}
}
