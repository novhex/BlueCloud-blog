<?php


namespace Controllers;

use Controller\Controller;

use View\View;

use HybridLogic\Validation\Validator;

use HybridLogic\Validation\Rule;
	

class Home extends Controller{

	public function __construct(){

		parent::__construct();

	}


	public function index(){

		$data['blogs'] = $this->query_builder->from('posts');
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

			$validator = new Validator();

			$validator->set_label('blog_title','Blog Title')
					  ->set_label('blog_contents','Blog Contents')
					  ->set_label('blog_id','Blog ID')

					  ->add_filter('blog_title','trim')
					  ->add_filter('blog_contents','trim')

					  ->add_rule('blog_title',new Rule\NotEmpty)
					  ->add_rule('blog_contents',new Rule\NotEmpty)
					  ->add_rule('blog_title',new Rule\MinLength(5));


		if($validator->is_valid($_POST)==FALSE){

			set_flashdata('errors',$validator->get_errors());
			redirect(base_url('blog/write-blog'));
		}else{

			$data = array(
				'title'=>		get_data('post','blog_title'),
				'contents'=>	get_data('post','blog_contents'),
				'date_added'=>	date('Y-m-d h:i:s'),
				'title_slug'=>	create_url_title(get_data('post','blog_title'),'-',TRUE)

				);

			$query = $this->query_builder->insertInto('posts',$data)->execute();

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

		$data['selected_blog'] = $this->query_builder->from('posts')->where('title_slug',$blog_slug);
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



			$validator = new Validator();

			$validator->set_label('blog_title','Blog Title')
					  ->set_label('blog_contents','Blog Contents')
					  ->set_label('blog_id','Blog ID')

					  ->add_filter('blog_title','trim')
					  ->add_filter('blog_contents','trim')

					  ->add_rule('blog_title',new Rule\NotEmpty)
					  ->add_rule('blog_contents',new Rule\NotEmpty)
					  ->add_rule('blog_title',new Rule\MinLength(5));


		if($validator->is_valid($_POST)==FALSE){

			set_flashdata('errors',$validator->get_errors());
			redirect(base_url('blog/edit-blog/').get_data('post','blog_slug'));
			
		}else{

			$data = array(
				'title'=>		get_data('post','blog_title'),
				'contents'=>	get_data('post','blog_contents'),
				'title_slug'=>	create_url_title(get_data('post','blog_title'),'-',TRUE)

				);

			$query = $this->query_builder->update('posts')->set($data)->where('id', get_data('post','blog_id'))->execute();


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

	$query = $this->query_builder->deleteFrom('posts')->where('title_slug',$blog_slug)->execute();

		if(is_int($query)){

			set_flashdata('success_message','Blog has been deleted.'); 
 			redirect(base_url());

		}

	}


}
