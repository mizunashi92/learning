<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Hit_model extends CI_Model{

		public function __construct() {
			
			$this->load->database();

		}

		public function get_hit() {
			$query = $this->db->query("SELECT slug,url, 
					sum(case when DATE(created_at) = CURRENT_DATE then 1 else 0 end) as TodayHits,
					sum(case when DATE(created_at) = DATE_SUB(CURRENT_DATE,INTERVAL 1 DAY) then 1 else 0 end) as YesterdayHits,
					sum(case when YEARWEEK(created_at,1) = YEARWEEK(CURRENT_DATE, 1) then 1 else 0 end) as WeekHits,
					sum(case when YEAR(created_at) = YEAR(CURRENT_DATE) then 1 else 0 end) as MonthHits,
					count(slug) as TotalHits
					FROM hit_stat
					WHERE slug IN (SELECT username FROM agents)
					GROUP BY slug
					ORDER BY slug ASC");

			return $query->result_array();

		}

	}