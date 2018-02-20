<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingsModel extends CI_Model {
    public  function __construct() {
		parent::__construct();
	}		
   
	public function setValue($key,$val){
		$this->db->select('*');
        $this->db->from('settings');
        $this->db->where('Key',$key);
        $query = $this->db->get();
		$result = $query->row_array();
		if($key==$result['Key']){
			$data = array(
			'value' =>$val
			);
			$this->db->where('Key',$key);
			$this->db->update('settings', $data);
			return true;
		}else{
			$data = array(
			'Key' =>$key,
			'value' =>$val			
				);
			$this->db->insert('settings', $data);
			return true;
		}
	  	
	}
	public function getValue($key){
		$this->db->select('*');
        $this->db->from('settings');
        $this->db->where('Key',$key);
        $query = $this->db->get();
		$result = $query->row_array();
		return $result['value'];
		
	}
}
	