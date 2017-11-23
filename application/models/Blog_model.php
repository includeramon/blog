<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($limit = 10, $offset = 0)
	{
		$query = $this->db->query('select * from POSTS LIMIT '.$limit.' OFFSET ' .$offset);
		return $query->result_array();
	}
}
