<?php

class questions extends CI_MODEL {

    public function __construct() {
        $this->load->database();
    }
	
    public function getfaq(){
	
        $db = $this->db;
        $sql = "SELECT * FROM  questions";
        $result = $db->query($sql);

        if($result->num_rows() == 0)
            return false;
        return $result;

	}
	
}
?>