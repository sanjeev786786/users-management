<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationModel extends CI_Model {
  
	public function getcountry(){
		$this->db->select('*');
        $this->db->from('countries');
        $query = $this->db->get();
        return $query->result();
	}
	public function getcity($id,$table){
	    $this->db->select('cities.id as id,cities.name as name');
		$this->db->from($table);
		$this->db->join('cities', 'cities.state_id = states.id');
		$this->db->where('states.country_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	 
    }
	public function getcity1($id,$table){
	    $this->db->select('cities.id as id,cities.name as name');
		$this->db->from($table);
		$this->db->join('cities', 'cities.state_id = states.id');
		$this->db->where('states.country_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	 
    }
	public function getsign_up($data){
		$this->db->insert('user',$data);
		//echo $this->db->last_query();
		$insert_id = $this->db->insert_id();
        //print_r($insert_id); exit();
        return  $insert_id;
	}
	
	
	public function checkemailStatus($email) {
		
			$this->db->select('*');
	        $this->db->from('user');
	        $this->db->where('email', $email);
	        
	        $this->db->limit(1);

	        $query = $this->db->get();

	        if ($query->num_rows() == 1) { 
				return true;
			}else{
				return false;
			}
	  }
	public function getsignup($sign_up){
		if($this->input->post('Shipment')){
			
		 $first_name = $this->input->post('first_namebilling');
		 $last_name = $this->input->post('last_namebilling');
		 $company_name = $this->input->post('company_namebilling');
		 $street = $this->input->post('streetbilling');
		 $number = $this->input->post('numberbilling');
		 $postcode = $this->input->post('postcodebilling');
		 $country_id = $this->input->post('countrybilling');
		 $city_id = $this->input->post('citybilling');
		 $phone_number = $this->input->post('phone_numberbilling');
		 $created_at = date('Y-m-d');
		 $updated_at = date('Y-m-d');
		 $user_id = $sign_up['insert_id'];
		 $type = 'billing';
		 $data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>1,
			'phone_number'=>$phone_number,
			'user_id'=>$user_id,
			'type'=>$type,
			'updated_at' => date('Y-m-d'),
			'created_at' => date('Y-m-d'),
			);
			//print_r($data); exit();
		 $this->db->insert('address',$data);
		
         $first_name1 = $this->input->post('first_nameshipment');
		 $last_name1 = $this->input->post('last_nameshipment');
		 $company_name1 = $this->input->post('company_nameshipment');
		 $street1 = $this->input->post('streetshipment');
		 $number1 = $this->input->post('numbershipment');
		 $postcode1 = $this->input->post('postcodeshipment');
		 $country_id1 = $this->input->post('countryshipment');
		 $city_id1 = $this->input->post('cityshipment');
		 $phone_number1 = $this->input->post('phone_numbershipment');
		 $created_at1 = date('Y-m-d');
		 $updated_at11 = date('Y-m-d');
		 $user_id1 = $sign_up['insert_id'];
		 $type1 = 'shipment';
		  $data1 = array(
			'first_name'=>$first_name1,
			'last_name'=>$last_name1,
			'company_name'=>$company_name1,
			'street'=>$street1,
			'number'=>$number1,
			'postcode'=>$postcode1,
			'country_id'=>$country_id1,
			'city_id'=>$city_id1,
			'phone_number'=>$phone_number1,
			'user_id'=>$user_id1,
			'type'=>$type1,
			'updated_at' => date('Y-m-d h:i:sa'),
			'created_at' => date('Y-m-d h:i:sa'),
			);	
			//print_r($data1); exit();
         $this->db->insert('address',$data1);
          
		}else{
		 $first_name = $this->input->post('first_nameshipment');
		 $last_name = $this->input->post('last_nameshipment');
		 $company_name = $this->input->post('company_nameshipment');
		 $street = $this->input->post('streetshipment');
		 $number = $this->input->post('numbershipment');
		 $postcode = $this->input->post('postcodeshipment');
		 $country_id = $this->input->post('countryshipment');
		 $city_id = $this->input->post('cityshipment');
		 $phone_number = $this->input->post('phone_numbershipment');
		 $created_at = date('Y-m-d h:i:sa');
		 $updated_at = date('Y-m-d h:i:sa');
		 $user_id = $sign_up['insert_id'];
		 $type = 'shipment';
		 $data2 = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>$city_id,
			'phone_number'=>$phone_number,
			'user_id'=>$user_id,
			'type'=>$type,
			'updated_at' => date('Y-m-d h:i:sa'),
			'created_at' => date('Y-m-d h:i:sa'),
			);
		$this->db->insert('address',$data2);
	
		}
		
	}
	
	 public function mail_exists($key)
		{
			$this->db->where('email',$key);
			$query = $this->db->get('user');
			if ($query->num_rows() > 0){
				return false;
			}
			else{
				return true;
			}
		}
	public function	get_pass_length(){
		$this->db->select("*");
		$this->db->from("settings");
		$this->db->where('key','MINIMAL_PASSWORD_LENGTH');
		$query = $this->db->get();
		$pslen=$query->row_array();
		return $pslen['value'];
	}
	public function get_dob(){
		$this->db->select("*");
		$this->db->from("settings");
		$this->db->where('key','MINIMAL_BIRTHDAY_DAY');
		$query = $this->db->get();
		$pslen=$query->row_array();
		return $pslen['value'];
	}
	public function get_user_setting($key){
		$this->db->select("*");
		$this->db->from("settings");
		$this->db->where('key',$key);
		$query = $this->db->get();
		$usr_setting=$query->row_array();
		return $usr_setting['value'];
	}
	public function get_billing_address($id){
		$this->db->select("*");
		$this->db->from("address");
		$this->db->where('user_id',$id);
		$this->db->where('type','billing');
		$query = $this->db->get();
		$bill_address=$query->row_array();
		return $bill_address;
		
	}
	public function get_all_billing_address(){
		$this->db->select("*");
		$this->db->from("address");
		$this->db->where('type','billing');
		$query = $this->db->get();
		$bill_address=$query->result_array();
		return $bill_address;
	}
	public function get_shipping_address($id){
		$this->db->select("*");
		$this->db->from("address");
		$this->db->where('user_id',$id);
		$this->db->where('type','shipment');
		$query = $this->db->get();
		$bill_address=$query->row_array();
		return $bill_address;
		
	}
	public function get_all_shippin_address(){
		$this->db->select("*");
		$this->db->from("address");
		$this->db->where('type','shipment');
		$query = $this->db->get();
		$bill_address=$query->result_array();
		return $bill_address;
	}
	
	
}