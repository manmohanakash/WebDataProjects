<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subscribe extends CI_Controller {


	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('subscription');
		$this->load->library('form_validation');


		//Below helpers can be autoloaded in the config too
		$this->load->helper('url');
		$this->load->helper('array');
		$this->load->helper('security');
		$this->load->helper('form');

	}



	public function validate_member($item){
		if($item == 'Select'){
			$this->form_validation->set_message('validate_member', 'Please choose an option.');
			return false;
		} 
		else
			return true;
	}

	public function subscribe(){

	$submitted = 0;
	$servicelist =$this->subscription-> getservice();
	$petlist = $this->subscription-> getpet();
	$data['servicelist'] = $servicelist;
	$data['petlist'] = $petlist;
	$info="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$array = array(
			'name' => xss_clean($this->input->post('name')),
			'address' => xss_clean($this->input->post('address')),
			'email' => xss_clean($this->input->post('email')),
			'phone' => xss_clean($this->input->post('phone')),
			'password' => xss_clean($this->input->post('password')),
			'type_of_service' => xss_clean($this->input->post('type_of_service')),
			'pet' =>  xss_clean($this->input->post('pet'))
		);	

		$this->form_validation->set_error_delimiters('<div class="erralert">','</div>');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('phone','Phone', 'required|regex_match[/^\d{10}$/]');
		$this->form_validation->set_rules('password','Password','required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/]',
			array('regex_match' => 'Password should match the below requirement<ul><li>Should contain 8 to 16 characters</li><li>one uppercase</li><li>one lowercase</li><li>one digit</li></ul>'));
		$this->form_validation->set_rules('type_of_service','Service','callback_validate_member');
		$this->form_validation->set_rules('pet','Pet','callback_validate_member');

		if($this->form_validation->run() == TRUE){

			$clientexists = $this->subscription->checkclient(element('email', $array));
			$serviceid = $this->subscription->getserviceid(element('type_of_service', $array));
			$petid = $this->subscription->getpetid(element('pet', $array));
			$today = date("Y-m-d");
				
				if(!$clientexists){
					$this->subscription->addclient((element('name', $array)),(element('address', $array)),(element('phone', $array)),(element('email', $array)),do_hash((element('password', $array)), 'md5'));
					$clientid =  $this->subscription->getclientid(element('email', $array));
					$this->subscription->addsubscription($clientid,$serviceid,$petid,$today);
					$info = "<div class=\"msgalert\">Your request has been submitted.</div>";
					$submitted = 1 ;
				}
				else{

					$clientpassword = $this->subscription->getclientpassword(element('email', $array));
					$check_password= do_hash((element('password', $array)), 'md5');
					if ( $check_password == $clientpassword ){
					$clientid =  $this->subscription->getclientid((element('email', $array)));
					//Check if already subscribed
						if(!$this->subscription->subscribed($clientid,$serviceid,$petid)){
							$this->subscription->addsubscription($clientid,$serviceid,$petid,$today);
							$info = $info ."<div class=\"msgalert\">Your request has been submitted.</div>";		
							$submitted = 1;							
						}
						else{
							$info = $info."<div class=\"msgalert\">You are already subscribed for this service.</div>";	
						}
					}
					else{
						$info = $info . "<div class=\"erralert\">Incorrect Password</div>";
					}

				}
			}
				

		$data['info'] = $info;

		if($submitted==0){
		if(!empty($_POST['name'])) $data['name']= $_POST['name'];
		if(!empty($_POST['address'])) $data['address']= $_POST['address'];
		if(!empty($_POST['email'])) $data['email'] = $_POST['email'];
		if(!empty($_POST['phone'])) $data['phone'] = $_POST['phone'];
		if(!empty($_POST['password'])) $data['password'] = $_POST['password'];
		if(!empty($_POST['type_of_service'])) $data['type_of_service'] = $_POST['type_of_service'];
		if(!empty($_POST['pet'])) $data['pet'] = $_POST['pet'];
		}
	}

	$this->load->view('header');
	$this->load->view('subscribe',$data);
	$this->load->view('footer');

	}
}
