<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page = 'home') {
		
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
			redirect('members');
		}
		
		$data['title'] = ucfirst($page);

		#Posts Section
		$slug = FALSE;
		$section = 'p';
		$data['title_post'] = 'Latest Posts';
		$data['posts'] = $this->Post_model->get_posts($slug,$section);
		$data['schedules'] = $this->Schedule_model->get_public_posts();
		//print_r($data['posts']);
		$data['title_video'] = 'Latest Video';
		$data['video'] = $this->Video_model->get_video();
		//print_r($data['video']);
        $data['addon'] = "APL TOWER, lt 11, suite 01, Jl. S Parman Kav. 28, Jakarta Barat, Jakarta, RT.12/RW.6, Tj. Duren Sel., Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470 ";
		$data['url'] = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7933.368115456088!2d106.78514577266826!3d-6.173038315466777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65f9cb091cd%3A0x2590dc28508852f8!2sAllianz+Life+Indonesia!5e0!3m2!1sen!2sid!4v1530198772655";
		$data['mailnya'] = "sonnyarief@gmail.com";
		$data['phone'] = "0815-1396-7907";
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');

	}

	public function view_post($slug = NULL) {
		
		$section = 'p';
		
		if($this->uri->segment(3) != NULL){
			$slug = $this->uri->segment(3);
		}

		$data['post'] = $this->Post_model->get_posts($slug,$section);
		//print_r($data['posts']);
		
		if(empty($data['post'])) {
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	
	}

	public function add_count($url,$slug) {
	
	    $this->load->helper('cookie');
		$check_visitor = $this->input->cookie(urldecode($url), FALSE);
	    $ip = $this->input->ip_address();
		
	    if ($check_visitor == false) {
	    
	        $this->input->set_cookie('name', urldecode($url), 'value', $ip, 'expire', time()+7200,'secure',FALSE);
	        $this->Post_model->update_counter_product($slug,$ip,urldecode($url));
	        
	    }

	}
	

	public function view_agent() {

		$slug  = $this->uri->segment(1);
		$url = current_url();
		$this->add_count($url,$slug);
		$data['title_agent'] = "Profile";
		$data['agent'] = $this->Agent_model->get_agent($slug);
		$data['schedules'] = $this->Schedule_model->get_public_posts();
		
		if(empty($data['agent'])) {
			redirect('');
		}

		$data['title'] = "Home";
		$data['username'] = $slug;
		#Posts Section
		$slug = FALSE;
		$section = 'p';
		$data['title_post'] = 'Latest Posts';
		$data['posts'] = $this->Post_model->get_posts($slug,$section);
		//print_r($data['posts']);
		
		$data['title_video'] = 'Latest Video';
		$data['video'] = $this->Video_model->get_video();
		//print_r($data['video']);

		#Posts Section
		$data['title_post'] = 'Personal Articles';
		$slug = $this->session->userdata('username');
		$data['personal'] = $this->Agent_model->get_personal($slug);
		//print_r($data['posts']);
		$data['addon'] = "APL TOWER, lt 11, suite 01, Jl. S Parman Kav. 28, Jakarta Barat, Jakarta, RT.12/RW.6, Tj. Duren Sel., Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470 ";
		$data['url'] = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7933.368115456088!2d106.78514577266826!3d-6.173038315466777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f65f9cb091cd%3A0x2590dc28508852f8!2sAllianz+Life+Indonesia!5e0!3m2!1sen!2sid!4v1530198772655";
		

		$this->load->view('templates/header', $data);
		$this->load->view('pages/view_agent', $data);
		$this->load->view('templates/footer');
		
	}
}
