<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

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
		$this->load->model('ChangePasswordModel');
		$this->load->helper('settings_helper');
		
        }
	public function index()
	{   
	    $data['userdata'] = $this->session->userdata("user_details");
		//print_r($data['userdata']); exit();
		 $this->load->helper('settings_helper');
		 if(!isset($data['userdata'])){
			
			redirect('account', 'refresh');
			
		 }
		 else{  
		  if(isset($_POST['c_pass'])){
			  $currentPassword = $this->input->post('currentPassword');
			  $udetail = $data['userdata'];
		      $id = $udetail['user_id'];
			  $user_data= $this->ChangePasswordModel->user_data($id);
			  $userpass = $user_data['password'];
			  $pass =$this->encrypt->decode($userpass);
			  //print_r($pass); exit();
			   if($pass == $currentPassword){
				  $newPassword = $this->input->post('newPassword'); 
				  $pass1 =$this->encrypt->encode($newPassword); 
				  $match_new = $this->ChangePasswordModel->change_pass($id,$pass1);
				  $this->session->set_flashdata('msg',"Password Changed Successfully");	
				  redirect('changepassword', 'refresh');
			   }else{
				   $this->session->set_flashdata('msg'," Incorrect Current Password");	
					redirect('changepassword', 'refresh');
			   }
		   }
		    $udetail = $data['userdata'];
		    $user_type = $udetail['user_type'];
			//print_r($user_type);exit();
			if($user_type == 'admin'){
			$this->load->view('headerAdmin',$data);
			$this->load->view('changepassword',$data);
			$this->load->view('footerAdmin');	
			}elseif($user_type == 'user'){
			$this->load->view('headerUser',$data);
			$this->load->view('changepassword',$data);
			$this->load->view('footerUser');
			}elseif($user_type == 'customer'){
		    $this->load->view('headerCustomer',$data);
			$this->load->view('changepassword',$data);
			$this->load->view('footerCustomer');
			}  
			
		 }
	}
	
	

}