<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	public function index() {
		
		$this->load->view('partials/_header');
		$this->load->view('pages/videos');
		$this->load->view('partials/_footer');

	}
}
