<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model {
    public  function __construct() {
		parent::__construct();
	}
	public function check_user($where){
		$this->db->select('*');
        $this->db->from('user');
		$this->db->where('status',1);
		$this->db->where('id',$where['id']);
		//echo $this->db->last_query(); exit();
        $query = $this->db->get();
		return $query->num_rows();
	}
	public function is_user($table,$where){
		
		$this->db->select('*');
        $this->db->from($table);
		$this->db->where('email',$where['email']);
        $query = $this->db->get();
		//echo $this->db->last_query(); exit(); 
		return $query->row_array();
	}
	 public function forgotupdate($id,$pass1){
	   $this->db->where('id', $id);
		$this->db->set('password', $pass1);
		$query = $this->db->update('user');
		//echo $this->db->last_query(); exit();
		if($query){
			return true;
		}else{
			return false;
		}
	   
	}
	public function getcountry(){
		$this->db->select('*');
        $this->db->from('countries');
        $query = $this->db->get();
        return $query->result();
	}
	public function getculars($id,$table){
	    $this->db->select('cities.id as id,cities.name as name');
		$this->db->from($table);
		$this->db->join('cities', 'cities.state_id = states.id');
		$this->db->where('states.country_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	 
        }
   public function activate_user($random)
   {
	     $data=array('status'=>'1');
		 $this->db->where('code',$random);
		 $this->db->update('user',$data);
   }
   public function gettoken($data){
		//print_r($data); exit();
		$this->db->insert('user_token',$data);
		//echo $this->db->last_query();
	}
   public function get_user_detail($id){
	   $this->db->select('*');
        $this->db->from('user');
		$this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
   }	
   public function get_user_id($id,$token){
	    $this->db->select('*');
        $this->db->from('user_token');
		$this->db->where('user_id',$id);
		$this->db->where('token',$token);
        $query = $this->db->get();
		$dd=$query->row_array();
        return $query->row_array();
   }	   
	
}
	