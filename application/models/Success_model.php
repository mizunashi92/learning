<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Success_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_posts($slug = FALSE,$section) {

			if($slug === FALSE) {
				
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get_where('success', array('section' => $section));
				return $query->result_array();
				
			}

			$query = $this->db->get_where('success', array('slug' => $slug));

			return $query->row_array();
		}

		public function get_all_posts($slug = NULL) {

			if($slug === NULL){
				
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get_where('success');
				return $query->result_array();
				
			}

			$query = $this->db->get_where('success', array('slug' => $slug));

			return $query->row_array();
				
		}


		public function create_post($post_image) {

			$slug = url_title($this->input->post('title'));

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'section' => $this->input->post('section'),
					'image' => $post_image,
					'created_by' => $this->session->userdata('name')
				);

			return $this->db->insert('success', $data);

		}

		public function delete_post($id) {

			$this->db->where('id', $id);
			$this->db->delete('success');

			return true;

		}

		public function update_post($post_image) {

			$slug = url_title($this->input->post('title'));

			$data = array(
					'title' => $this->input->post('title'),
					'slug' => $slug,
					'body' => $this->input->post('body'),
					'section' => $this->input->post('section'),
					'image' => $post_image,
					'created_by' => $this->session->userdata('name')
				);

			$this->db->where('id', $this->input->post('id'));

			return $this->db->update('success', $data);
		}

	}