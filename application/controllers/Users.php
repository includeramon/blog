<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('url');
		$this->load->model('users_model');
		$this->load->model('blog_model');
		// $this->load->library('session');
	}

	public function index()
	{
		$id = $this->session->userdata('userid');
		$data['posts'] = $this->blog_model->get_user_posts($id);
		$this->load->view('user-page', $data);
	}
	
}
