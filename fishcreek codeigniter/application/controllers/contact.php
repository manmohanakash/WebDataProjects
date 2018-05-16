<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model('contactus');
		$this->load->library('form_validation');

		//Below helpers can be autoloaded in the config too
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->helper('security');
		$this->load->helper('form');
	}

	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function contact_submit(){	

		$submitted=0;

		$array = array(
			'name' => xss_clean($this->input->post('name')),
			'email' => xss_clean($this->input->post('email')),
			'comments' => xss_clean($this->input->post('comments'))
		);	

		$this->form_validation->set_error_delimiters('<div class="erralert">','</div>');

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('comments','Comments','required');
		
		if($this->form_validation->run() == TRUE){
			
			$this->contactus->addcontact((element('name', $array)),(element('email', $array)),(element('comments', $array)));
			$submitted=1;
		}

		$data="";

		if($submitted==0)
		{
			if(!empty($_POST['name'])) $data['name']= $_POST['name'];;
			if(!empty($_POST['email'])) $data['email']= $_POST['email'];
			if(!empty($_POST['comments'])) $data['comments']= $_POST['comments'];	
		}
		else
			$data['information']="<div class=\"msgalert\">Your request has been submitted.</div>";

		$this->load->view('header');
		$this->load->view('contact',$data);
		$this->load->view('footer');
	}

}
