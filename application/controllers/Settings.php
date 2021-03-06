<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
		$this->load->model('SettingsModel');
		$this->load->helper('settings_helper');
         }
	public function index()
	{   
	    $data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{  
		  $this->load->helper('settings_helper');
		/*  $data['query']=$this->functions->getsettings(); */
	    $this->load->view('headerAdmin',$data);
		$this->load->view('settings',$data);
		$this->load->view('footerAdmin');
		 }
	}
	public function updatesettings(){
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{ 
			if( $this->input->post('update1')) 
			 {
				// print_r($_POST);
				 $v=$this->SettingsModel->getValue("USER_ADDRESS_REQUEST");
				 //echo $v;
				// exit;
                 foreach($_POST as $key=>$val){
					 $update_data=$this->SettingsModel->setValue($key,$val);
				 }
				 //$data['update'] = $this->SettingsModel->updatettings();
				 $this->session->set_flashdata('msg',"Updated Successfully");
						 redirect('settings','refresh'); 
			 }
		 }		 
	} 	
	
	
	

}