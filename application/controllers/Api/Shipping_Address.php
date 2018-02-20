<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping_Address extends CI_Controller {

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
		$this->load->model('AccountModel');
		$this->load->model('RegistrationModel');
		}
	
	
	
	public  function index() {
	  $input_data = json_decode(file_get_contents("php://input"));
     // print_r($input_data); exit();
	  //exit();
	  $result_array=array();	
	  $user_id=$this->AccountModel->get_user_id($input_data->ID_USER,$input_data->Token); 
	  if(!empty($user_id)){
	  $user_datail=$this->AccountModel->get_user_detail($user_id['user_id']); 
	   if($user_datail['user_type']=='admin'){
		   $all_shipp_address=array('status'=>'ok','data'=>$this->RegistrationModel->get_all_shippin_address());
	   }else{
		  $all_shipp_address=array('status'=>'ok','data'=> $this->RegistrationModel->get_shipping_address($user_datail['id']));
	   }
	  }else{
		  $all_shipp_address['status']="Invalid login";
		  
	  }
	  echo json_encode($all_shipp_address);
	  
     }
    
}