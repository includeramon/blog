<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($limit = 10, $offset = 0)
	{
		$query_string = 'SELECT * FROM POSTS LIMIT '.$limit.' OFFSET ' .$offset;
		$query = $this->db->query($query_string);
		return $query->result_array();
	}

	public function get_user_posts($id)
	{
		$query_string = 'SELECT * FROM POSTS ' . 
		                 'WHERE POSTS_USER_ID='.$id ;
		$query = $this->db->query($query_string);
		return $query->result_array();
	}

	public function get_user_post_edit($id)
	{
		$query_string = 'SELECT * FROM POSTS ' . 
		                 'WHERE POSTS_ID='.$id .' LIMIT 1' ;
		$query = $this->db->query($query_string);
		return $query->row();
	}

	public function delete_post($id)
	{
		$query_string = 'DELETE FROM POSTS ' . 
		                 'WHERE POSTS_ID='.$id ;
		$query = $this->db->query($query_string);
	}

	public function upsert_post($data)
	{
		
		$check_query_string = 'SELECT * FROM POSTS ' . 
		                 'WHERE POSTS_ID='.$data['id'] ;
		
		if($this->db->query($check_query_string)->num_rows() > 0)
		{
			$query = "UPDATE POSTS SET " . 
						"POSTS_ID='".$data['id']."'," .
						"POSTS_USER_ID='".$data['userid']."'," .
						"POSTS_TITLE='".$data['title']."'," .
						"POSTS_CONTENT='".$data['content']."'," .
						"POSTS_CREATED='".$data['created']."'," .
						"POSTS_PUBLISHED='".$data['published']."' WHERE POSTS_ID=".$data['id'] ;
		}
		else
		{
			$query = 'INSERT INTO POSTS VALUES(' . 
						$data['id']. ',' .
						$data['userid'].',' .
						$data['title'].',' .
						$data['content'].',' .
						$data['created'].',' .
						$data['published'].') WHERE POSTS_ID='.$id;
		}
		// return $query;
		$this->db->query($query);
	}
}
