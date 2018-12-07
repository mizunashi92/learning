<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learning_model extends CI_Model{



	public function __construct() {

			

		$this->load->database();



	}


	public function get_all_posts($slug = NULL) {



		if($slug === NULL){

				

			$this->db->order_by('id', 'DESC');

			$query = $this->db->get_where('learning');

			return $query->result_array();

				

		}



		$query = $this->db->get_where('learning', array('slug' => $slug));



		return $query->row_array();

				

	}



	public function get_all_videos($id_video) {

		

		if($id_video === NULL){

				

			$this->db->order_by('id_video', 'DESC');

			$query = $this->db->get_where('learning_videos');

			return $query->result_array();

				

		}



		$query = $this->db->get_where('learning_videos', array('id_video' => $id_video));



		return $query->row_array();



	}

	public function get_all_videos_section($slug) {

		

		$query = $this->db->get_where('learning_videos', array('section' => $slug));



		return $query->result_array();



	}




	public function get_all_files($id_file) {



		if($id_file === NULL){

				

			$this->db->order_by('id_file', 'DESC');

			$query = $this->db->get_where('learning_files');

			return $query->result_array();

				

		}



		$query = $this->db->get_where('learning_files', array('id_file' => $id_file));



		return $query->row_array();



	}

	public function get_all_files_section($slug) {

		

		$query = $this->db->get_where('learning_files', array('section' => $slug));



		return $query->result_array();



	}

	public function create_post($post_file) {



		$slug = url_title($this->input->post('title'));



		# Input main table

		$data_m = array(

				'title' => $this->input->post('title'),

				'slug' => $slug,

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

		);



		$this->db->insert('learning', $data_m);

		$id = $this->db->insert_id();



		# Input video table

		if(!empty($this->input->post('url'))){



			$this->load->library('video_id');

			$url = $this->video_id->getIdFromUrl($this->input->post('url'));



			$data_v = array(

				'id' => $id,

				'title' => $this->input->post('ytitle'),

				'url' => $url,

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

			);



		}



		# Input file table

		if(!empty($post_file)){



			$data_f = array(

				'id' => $id,

				'title' => $this->input->post('ftitle'),

				'file' => $post_file,
				
				'section' => $this->input->post('section'),

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

			);

			$this->db->insert('learning_videos', $data_v);

			return $this->db->insert('learning_files', $data_f);

		}else{



			return $this->db->insert('learning_videos', $data_v);

		}



	}



	public function add_video() {



		$this->load->library('video_id');

		$url = $this->video_id->getIdFromUrl($this->input->post('url'));



		$data_v = array(

				'title' => $this->input->post('title'),

				'url' => $url,

				'section' => $this->input->post('section'),

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

		);



		return $this->db->insert('learning_videos', $data_v);



	}



	public function add_file($post_file,$image_file) {



		$data_f = array(

				'title' => $this->input->post('title'),

				'file' => $post_file,

				'img' => $image_file,
				'section' => $this->input->post('section'),

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

		);



		return $this->db->insert('learning_files', $data_f);



	}





	public function update_post() {



		$slug = url_title($this->input->post('title'));



		$data = array(

				'title' => $this->input->post('title'),

				'slug' => $slug,

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

			);



		$this->db->where('id', $this->input->post('id'));



		return $this->db->update('learning', $data);

	}



	public function update_video() {



		$this->load->library('video_id');

		$url = $this->video_id->getIdFromUrl($this->input->post('url'));



		$data_v = array(

				'title' => $this->input->post('title'),

				'url' => $url,
				'section' => $this->input->post('section'),

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

		);



		$this->db->where('id_video', $this->input->post('id_video'));



		return $this->db->update('learning_videos', $data_v);

	

	}



	public function update_file($post_file,$image_file) {



		$data_f = array(

				'title' => $this->input->post('title'),

				'file' => $post_file,

				'img' => $image_file,
				'section' => $this->input->post('section'),

				'created_by' => $this->session->userdata('name'),

				'created_at' => date('Y-m-d H:i:s')

		);



		$this->db->where('id_file', $this->input->post('id_file'));



		return $this->db->update('learning_files', $data_f);

	

	}



	public function delete_post($id) {



		$this->db->where('id', $id);

		$this->db->delete('learning');



		return true;



	}



	public function delete_video($id) {



		$this->db->where('id_video', $id);

		$this->db->delete('learning_videos');



		return true;



	}



	public function delete_file($id) {



		$this->db->where('id_file', $id);

		$this->db->delete('learning_files');



		return true;



	}



}