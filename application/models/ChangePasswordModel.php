<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePasswordModel extends CI_Model {
   public function user_data($id){
	    $this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row_array();
   }
    public function change_pass($id,$pass1){
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
	
}