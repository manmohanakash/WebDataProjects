<?php

class subscription extends CI_MODEL {

    public function __construct() {
        $this->load->database();
    }

    public function getservice(){
        $db = $this->db;
        $sql = "SELECT * FROM service";
        $result = $db->query($sql);
        return $result;
    }

    public function getpet(){
        $db = $this->db;
        $sql = "SELECT * FROM pet";
        $result = $db->query($sql);
        return $result;
    }

    public function checkclient($email){
        $db = $this->db;
        $sql = 'SELECT * FROM client WHERE email=?';
        $result = $db->query($sql,array($email)); 
        if($result->num_rows()>0)
            return true;
        return false;
        
    }
	
    public function getclientid($email){
        $db = $this->db;
        $sql = 'SELECT * FROM client WHERE email=?';
        $result = $db->query($sql,array($email));
        $row = $result->row();
        return $row->clientid;
    }

        public function getclientpassword($email){
        $db = $this->db;
        $sql = 'SELECT * FROM client WHERE email=?';
        $result = $db->query($sql,array($email));
        $row = $result->row();
        return $row->password;
    }

    public function getserviceid($servicename){
        $db = $this->db;
        $sql = 'SELECT * FROM service WHERE servicename=?';
        $result = $db->query($sql,array($servicename));
        $row = $result->row();
        return $row->serviceid;
    }

    public function getpetid($petname){
        $db = $this->db;
        $sql = 'SELECT * FROM pet WHERE petname=?';
        $result = $db->query($sql,array($petname));  
        $row = $result->row();
        return $row->petid;
    }

    public function subscribed($clientid,$serviceid,$petid){
        $db = $this->db;
        $sql = 'SELECT * FROM subscription WHERE clientid=? AND serviceid=? AND petid=?';
        $result = $db->query($sql,array($clientid,$serviceid,$petid)); 
        if($result->num_rows()>0)
            return true;
        return false;
        
    }

    public function addclient($name,$address,$phone,$email,$password){
        $db = $this->db; 
        $sql = "INSERT INTO client(name,address,phone,email,password) values (?,?,?,?,?)";
        $result = $this->db->query($sql,array($name,$address,$phone,$email,$password)); 
        return $result;
    }

     public function addsubscription($clientid,$serviceid,$petid,$today){
        $db = $this->db;
        $sql = "INSERT INTO `subscription`(`clientid`, `serviceid`, `petid`, `date`) VALUES (?,?,?,?)";
        $result = $db->query($sql,array($clientid,$serviceid,$petid,$today));
        return $result;
    }
	
}
?>