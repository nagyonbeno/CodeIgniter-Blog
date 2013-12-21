<?php

Class Posts extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('post');
	}

	function index($start=0){
		$data['posts']=$this->post->get_posts(5,$start);
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $this->post->get_posts_count();
		$config['per_page'] = 5;
		
		$this->pagination->initialize($config);
		
		$data['pages']=$this->pagination->create_links();

		$this->load->view('header');
		$this->load->view('post_index',$data);
		$this->load->view('footer');
	}

	function post($post_id){
		$data['post']=$this->post->get_post($post_id);
		$this->load->view('post',$data);
	}

	function new_post(){
		if(!$this->correct_permissions('author')){
			redirect(base_url().'users/login');
		}
		if($_POST){
			$data=array(
				'cim' 		  => $_POST['cim'],
				'post_szoveg' => $_POST['post_szoveg'],
				'statusz'	  => 1
				);
		
		$this->post->insert_post($data);
		redirect(base_url().'posts/');
	} else {
		$this->load->view('new_post');
	}
	}

	function correct_permissions($required){
		$user_type = $this->session->userdata('user_type');
		if($required=="user"){
			if($user_type){
				return true;
			}
		}
		elseif($required=="author"){
			if($user_type=="admin" || $user_type=="author"){
				return true;
			}
		}
		elseif($required=="admin"){
			if($user_type=="admin"){
				return true;
			}
		}
	}

	function edit_post($post_id){
		if(!$this->correct_permissions('author')){
			redirect(base_url().'users/login');
		}
		$data['success']=0;
		if($_POST){
			$data_post=array(
				'cim' 		  => $_POST['cim'],
				'post_szoveg' => $_POST['post_szoveg'],
				'statusz'	  => 1
				);

		$this->post->update_post($post_id,$data_post);
		$data['success']=1;
		} 

		$data['post']=$this->post->get_post($post_id);
		$this->load->view('edit_post',$data);
	
	}

	function delete_post($post_id){
		if(!$this->correct_permissions('author')){
			redirect(base_url().'users/login');
		}
		$this->post->delete_post($post_id);
		redirect(base_url().'posts');

	}



}

?>