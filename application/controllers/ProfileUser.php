<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public  function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
        $this->load->library('email');
		$this->load->model('RegistrationModel');
		$this->load->model('ProfileModel');
		$this->load->helper('settings_helper');
         }
    public function index()
	{   
	    $data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{  
		$data['country'] = $this->RegistrationModel->getcountry();
		$udetail = $data['userdata'];
		$id = $udetail['user_id'];
		$data['shipment'] = $this->ProfileModel->getprofile($id);
		$data['billing'] = $this->ProfileModel->getprofile1($id);
		//print_r($data['shipment']); exit();
	    $this->load->view('header',$data);
		$this->load->view('profile',$data);
		$this->load->view('footer');
		 }
	}
	public function ajax_call(){
	$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{
			$id=$_REQUEST['q'];
		$res=$this->RegistrationModel->getcity($id,'states');
		//$details ="<label>City</label>";
		$details="<select name='cityshipment' class='form-control' style='width: 100%'>";
			$details.="<option value=''>City</option>";
			foreach($res as $values) { 
			$details.="<option value=\"".$values['id']."\">".$values['name']."</option>";
			   }
			$details.="</select>";
			echo $details;
			 
		 }
	
    }
	public function district_data(){
		//echo "hi"; exit();
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{
			
			$id=$_REQUEST['country_id'];
			//print_r($_REQUEST); exit();
			$res=$this->RegistrationModel->getcity1($id,'states');
		    $details="<select name='citybilling' class='form-control' style='width: 100%'  >";
			$details.="<option value=''>City</option>";
			foreach($res as $values) { 
			$details.="<option value=\"".$values['id']."\">".$values['name']."</option>";
			   }
			$details.="</select>";
			echo $details;
		}
	}
	public function updateprofile(){
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{
			 if($this->input->post('Shipment')!== Null && $this->input->post('billingid') !==Null){
               
			  // print_r($_POST); exit();
			  $udetail = $data['userdata'];
		      $id = $udetail['user_id'];
			  //print_r($id); exit();
		 $first_name = $this->input->post('firstnameshipment');
		 $last_name = $this->input->post('lastnameshipment');
		 $company_name = $this->input->post('companynameshipment');
		 $street = $this->input->post('streetshipment');
		 $number = $this->input->post('numbershipment');
		 $postcode = $this->input->post('postcodeshipment');
		 $country_id = $this->input->post('countryshipment');
		 $city_id = $this->input->post('cityshipment');
		 $phone_number = $this->input->post('phonenumbershipment');
		
		 $data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>$city_id,
			'phone_number'=>$phone_number,
			'updated_at' => date('Y-m-d h:i:sa'),
			);
		 $result['query']=$this->ProfileModel->updateprofile($id,$data);
		 
		 $first_name1 = $this->input->post('firstnamebilling');
		 $last_name1 = $this->input->post('lastnamebilling');
		 $company_name1 = $this->input->post('companynamebilling');
		 $street1 = $this->input->post('streetnamebilling');
		 $number1 = $this->input->post('numbernamebilling');
		 $postcode1 = $this->input->post('postcodebilling');
		 $country_id1 = $this->input->post('countrybilling');
		 $city_id1 = $this->input->post('citybilling');
		 $phone_number1 = $this->input->post('phonebilling');
		 $updated_at1 = date('Y-m-d h:i:sa');
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
			'updated_at' => date('Y-m-d h:i:sa'),
			);
			//print_r($data1); exit();
		 $result1['query']=$this->ProfileModel->updateprofile1($id,$data1);
		 $this->session->set_flashdata('msg',"Updated Successfully");
                     redirect('profile','refresh');
		 }
		 elseif($this->input->post('Shipment') == '' && $this->input->post('billingid') ==''){
                $udetail = $data['userdata'];
		      $id = $udetail['user_id'];
			  //print_r($id); exit();
		 $first_name = $this->input->post('firstnameshipment');
		 $last_name = $this->input->post('lastnameshipment');
		 $company_name = $this->input->post('companynameshipment');
		 $street = $this->input->post('streetshipment');
		 $number = $this->input->post('numbershipment');
		 $postcode = $this->input->post('postcodeshipment');
		 $country_id = $this->input->post('countryshipment');
		 $city_id = $this->input->post('cityshipment');
		 $phone_number = $this->input->post('phonenumbershipment');
		
		 $data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>$city_id,
			'phone_number'=>$phone_number,
			'updated_at' => date('Y-m-d h:i:sa'),
			);
		 $result['query']=$this->ProfileModel->updateprofile($id,$data);
		 $this->session->set_flashdata('msg',"Updated Successfully");
                     redirect('profile','refresh');
		 }
		  elseif($this->input->post('Shipment')!== Null && $this->input->post('billingid') ==''){
			 $udetail = $data['userdata'];
		      $id = $udetail['user_id'];
			  //print_r($id); exit();
		 $first_name = $this->input->post('firstnameshipment');
		 $last_name = $this->input->post('lastnameshipment');
		 $company_name = $this->input->post('companynameshipment');
		 $street = $this->input->post('streetshipment');
		 $number = $this->input->post('numbershipment');
		 $postcode = $this->input->post('postcodeshipment');
		 $country_id = $this->input->post('countryshipment');
		 $city_id = $this->input->post('cityshipment');
		 $phone_number = $this->input->post('phonenumbershipment');
		
		 $data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>$city_id,
			'phone_number'=>$phone_number,
			'updated_at' => date('Y-m-d h:i:sa'),
			);
		 $result['query']=$this->ProfileModel->updateprofile($id,$data);
		 
		 $first_name1 = $this->input->post('firstnamebilling');
		 $last_name1 = $this->input->post('lastnamebilling');
		 $company_name1 = $this->input->post('companynamebilling');
		 $street1 = $this->input->post('streetnamebilling');
		 $number1 = $this->input->post('numbernamebilling');
		 $postcode1 = $this->input->post('postcodebilling');
		 $country_id1 = $this->input->post('countrybilling');
		 $city_id1 = $this->input->post('citybilling');
		 $phone_number1 = $this->input->post('phonebilling');
		 $user_id = $id;
		 //$updated_at1 = date('Y-m-d h:i:sa');
		 $type = 'billing';
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
			'updated_at' => date('Y-m-d h:i:sa'),
			'created_at' => date('Y-m-d h:i:sa'),
			'user_id'=>$user_id,
			'type'=>$type,
			);
			//print_r($data1); exit();
		 $result1['query']=$this->ProfileModel->insertbilling($data1);
		 $this->session->set_flashdata('msg',"Updated Successfully");
                     redirect('profile','refresh');
		  }
		  elseif($this->input->post('Shipment') == '' && $this->input->post('billingid') !==Null){
			  $udetail = $data['userdata'];
		      $id = $udetail['user_id'];
			  //print_r($id); exit();
		 $first_name = $this->input->post('firstnameshipment');
		 $last_name = $this->input->post('lastnameshipment');
		 $company_name = $this->input->post('companynameshipment');
		 $street = $this->input->post('streetshipment');
		 $number = $this->input->post('numbershipment');
		 $postcode = $this->input->post('postcodeshipment');
		 $country_id = $this->input->post('countryshipment');
		 $city_id = $this->input->post('cityshipment');
		 $phone_number = $this->input->post('phonenumbershipment');
		
		 $data = array(
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'company_name'=>$company_name,
			'street'=>$street,
			'number'=>$number,
			'postcode'=>$postcode,
			'country_id'=>$country_id,
			'city_id'=>$city_id,
			'phone_number'=>$phone_number,
			'updated_at' => date('Y-m-d h:i:sa'),
			);
		  $result['query']=$this->ProfileModel->updateprofile($id,$data);
		  $del_id = $this->input->post('billingid');
		  $result['query1']=$this->ProfileModel->deleteprofile($del_id);
		  $this->session->set_flashdata('msg',"Updated Successfully");
                     redirect('profile','refresh');
		  }
		  
		  
	}
	}
}