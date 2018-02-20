<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends CI_Model {
    public  function __construct() {
		parent::__construct();
	}
	public function is_user($table,$where){
		$this->db->select('*');
        $this->db->from($table);
		$this->db->where('email',$where['email']);
        $query = $this->db->get();
		//echo $this->db->last_query(); exit(); 
		return $query->row_array();
	}
   
	

   
}
	