<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function new_user($data)
	{
		$this->db->insert('USER', $data);
	}
}


