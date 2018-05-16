<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services extends CI_Controller {


	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('servicelist');

		//Below helpers can be autoloaded in the config too
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->helper('security');
	}

	public function services()
	{	
		$servicelist = $this->servicelist->getservices();
		$data['servicelist'] = $servicelist;
		$this->load->view('header');
		$this->load->view('services',$data);
		$this->load->view('footer');
	}
	


}
