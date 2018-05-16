<?php

class contactus extends CI_MODEL {

    public function __construct() {
        $this->load->database();
    }
	
    public function addcontact($name,$email,$comments){
	
        $db = $this->db;
		$sql = 'INSERT INTO contact(name,email,comments) values (?,?,?)';
        $result = $db->query($sql,array($name,$email,$comments));

	}
	
}
?>