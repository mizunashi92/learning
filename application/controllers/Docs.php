<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docs extends CI_Controller {

	public function index($section) {
		
		$data['files'] = $this->Learning_model->get_all_data($section,'doc');

		$this->load->view('partials/_header');
		$this->load->view('pages/docs',$data);
		$this->load->view('partials/_footer');

	}
}
