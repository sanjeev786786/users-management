<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCustomer extends CI_Controller {

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
		$data['billing'] = $this->ProfileModel->getprofile1($id);
		$data['shipment'] = $this->ProfileModel->getprofile($id);
	    $this->load->view('headerCustomer',$data);
		$this->load->view('dashboardCustomer',$data);
		$this->load->view('footerCustomer');
		 }
	}
	
	
	

}
