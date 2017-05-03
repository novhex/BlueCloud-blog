<?php


namespace controllers;

use \Core\Controller\Controller;

use \Core\View\View;

use \Validator\Validator;
	

class Home extends Controller{

	public function __construct(){

		parent::__construct();

	}


	public function index(){

		$data['blogs'] = $this->ORM->from('posts');
		$data['page_title'] = 'BlueCloud Blog';
		$data['success_message'] = get_flashdata('success_message');
		View::show('components/header',$data);
		View::show('components/navbar');
		View::show('front-end/home',$data);
		View::show('components/footer');

	}



	public function write_blog(){

		$data['page_title'] = 'BlueCloud Blog - Write Blog';
		$data['errors'] = get_flashdata('errors');
		View::show('components/header',$data);
		View::show('components/navbar');
		View::show('front-end/write_blog',$data);
		View::show('components/footer');

	}


	public function save_blog(){

		if(is_token_valid()==TRUE){

		$validation = Validator::is_valid($_POST,array(

				'blog_title'=>'required|min_len,2|max_len,35',
				'blog_contents'=>'required|min_len,10'
			));


		if(is_array($validation)){

			set_flashdata('errors',$validation);
			redirect(base_url()."blog/write-blog");
		}else{

			$data = array(
				'title'=>		get_data('post','blog_title'),
				'contents'=>	get_data('post','blog_contents'),
				'date_added'=>	date('Y-m-d h:i:s'),
				'title_slug'=>	create_url_title(get_data('post','blog_title'),'-',TRUE)

				);

			$query = $this->ORM->insertInto('posts',$data)->execute();

			//does the query returned last insert id as string ?

			if(is_string($query)){

 				set_flashdata('success_message','Post has been added.'); 
 				redirect(base_url());

				}

			}

		}else{

				die("Invalid Token");
		}

	}

	public function edit_blog($blog_slug){

		$data['selected_blog'] = $this->ORM->from('posts')->where('title_slug',$blog_slug);
		$data['errors'] = get_flashdata('errors');
		$data['page_title'] = 'BlueCloud Blog';
		$data['success_message'] = get_flashdata('success_message');
		View::show('components/header',$data);
		View::show('components/navbar');
		View::show('front-end/edit_blog',$data);
		View::show('components/footer');

	}


	public function update_blog(){

		if(is_token_valid()==TRUE){

		$validation = Validator::is_valid($_POST,array(

				'blog_title'=>'required|min_len,2|max_len,35',
				'blog_contents'=>'required|min_len,10',
				'blog_id'=>'required|integer'
			));


		if(is_array($validation)){

			set_flashdata('errors',$validation);
			redirect(base_url()."blog/edit-blog/".get_data('post','blog_slug'));
			
		}else{

			$data = array(
				'title'=>		get_data('post','blog_title'),
				'contents'=>	get_data('post','blog_contents'),
				'title_slug'=>	create_url_title(get_data('post','blog_title'),'-',TRUE)

				);

			$query = $this->ORM->update('posts')->set($data)->where('id', get_data('post','blog_id'))->execute();


			if($query){

 				set_flashdata('success_message','Blog has been updated.'); 
 				redirect(base_url());

				}

			}

		}else{

			die("Invalid Token!!!");
		}

	}


	public function delete_blog($blog_slug){

	$query = $this->ORM->deleteFrom('posts')->where('title_slug',$blog_slug)->execute();

		if(is_int($query)){

			set_flashdata('success_message','Blog has been deleted.'); 
 			redirect(base_url());

		}

	}


}
