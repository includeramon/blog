<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url_helper');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['posts'] = $this->blog_model->get_posts();
		$this->load->view('blog', $data);
	}
}
