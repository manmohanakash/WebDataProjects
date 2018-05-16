<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class askvet extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('questions');

		//Below helpers can be autoloaded in the config too
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->helper('security');
	}

	public function askvet()
	{	
		
		

		$faq = $this->questions->getfaq();
		$data['faq'] = $faq;
		
		$this->load->view('header');
		$this->load->view('askvet', $data);
		$this->load->view('footer');
	}
	


}
