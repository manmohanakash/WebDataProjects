<?php

class servicelist extends CI_MODEL {

    public function __construct() {
        $this->load->database();
    }
	
    public function getservices(){
	
        $db = $this->db;
        $sql = "SELECT * FROM  service";
        $result = $db->query($sql);

        if($result->num_rows() == 0)
            return false;
        return $result;

	}
	
}
?>