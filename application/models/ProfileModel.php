<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileModel extends CI_Model {
  
	public function getprofile($id){
		//print_r($id); exit();
		$this->db->select('*');
        $this->db->from('address');
		$this->db->where('user_id',$id);
		$this->db->where('type','shipment');
        $query = $this->db->get();
		//echo $this->db->last_query(); exit(); 
		return $query->row_array();
	}
	public function getprofile1($id){
		//print_r($id); exit();
		$this->db->select('*');
        $this->db->from('address');
		$this->db->where('user_id',$id);
		$this->db->where('type','billing ');
        $query = $this->db->get();
		//echo $this->db->last_query(); exit(); 
		return $query->row_array();
	}
	public function updateprofile($id,$data){
		           $this->db->where('user_id',$id);
				   $this->db->where('type','shipment');
                   $this->db->update('address',$data);
	}
	public function updateprofile1($id,$data1){
		           $this->db->where('user_id',$id);
				   $this->db->where('type','billing');
                   $this->db->update('address',$data1);
				   //echo $this->db->last_query(); exit(); 
				   
	}
	public function insertbilling($data1){
		//echo "hi"; exit();
		$this->db->insert('address',$data1);
		//echo $this->db->last_query(); exit();
		}
		public function deleteprofile($id)
	{
		  $this -> db -> where('id', $id);
          $this -> db -> delete('address');
		  //echo $this->db->last_query(); exit();
		  
	}
}