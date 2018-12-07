<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
		
		$this->load->view('partials/_header');
		$this->load->view('pages/index');
		$this->load->view('partials/_footer');

	}
}
