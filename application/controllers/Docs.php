<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller {

	public function index() {
		
		$this->load->view('partials/_header');
		$this->load->view('pages/docs');
		$this->load->view('partials/_footer');

	}
}
