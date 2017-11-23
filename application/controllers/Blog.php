<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
		$this->load->helper('url_helper');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['posts'] = $this->blog_model->get_posts();
		$this->load->view('blog', $data);
	}

	public function delete_post($id)
	{
		$this->blog_model->delete_post($id);
		redirect(base_url().'users');
	}

	public function edit_post($id)
	{
	
		$data['id'] = $id;
		$this->load->view('edit',$data);
	}

	public function edit_save()
	{
		$data = array(
			'id' => $this->input->post('id'),
		 	'userid' => $this->session->userdata('userid'),
		 	'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'created' => date('Y-m-d H:i:s'),
			'published' => date('Y-m-d H:i:s')
		);

		$this->blog_model->upsert_post($data);
		redirect('users');
		
	}	
}
