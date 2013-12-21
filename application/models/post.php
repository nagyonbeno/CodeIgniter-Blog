<?php

Class Post extends CI_model{

	function get_posts($num=20,$start=0){
		$this->db->select()->from ('posts')->where('statusz',1)->order_by('datum','desc')->limit($num,$start);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_post($post_id){
		$this->db->select()->from ('posts')->where(array('statusz'=>1,'post_id'=>$post_id));
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function get_posts_count(){
		$this->db->select('post_id')->from('posts')->where('statusz',1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function insert_post($data){
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
	}

	function update_post($post_id,$data){
		$this->db->where('post_id',$post_id);
		$this->db->update('posts',$data);
	}

	function delete_post($post_id){
		$this->db->where('post_id',$post_id);
		$this->db->delete('posts');
	}


	
}

?>