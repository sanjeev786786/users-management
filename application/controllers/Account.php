<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
		
         }
	public function index()
	{
	     $data['userdata'] = $this->session->userdata("user_details");
		 if(isset($data['userdata'])){
			 $udetail = $data['userdata'];
		     $user_type = $udetail['user_type'];
			 $user_type = $udetail['user_type'];
			 if($user_type == 'admin'){
			 redirect('homeadmin', 'refresh');
			 }elseif($user_type == 'user'){
				redirect('homeuser', 'refresh'); 
			 }elseif($user_type == 'customer'){
				redirect('homecustomer', 'refresh');  
			 }
		 }else{
		  $data['userdata'] = $this->session->userdata("sess_data");
		  //print_r($data['userdata']); exit();
		  $data['content'] = $this->load->view('index',$data,true);
		  $this->load->view('layout',$data);
		 }
	}
	public function forgot(){
		if(!empty($this->session->userdata("user_details"))){
			redirect('account');
		}else{
		  $data['content'] = $this->load->view('forgot','',true);
		  $this->load->view('layout',$data);
		  }
	}
	
	public function forgot_email(){
		if(!empty($this->session->userdata("user_details"))){
			redirect('account');
		}else{
		if (isset($_POST['user_forgot'])){
			//print_r($_POST); exit();
			$check['email'] = $this->input->post('emauil_us');
			$user1 = $this->AccountModel->is_user('user',$check);
			if (!empty($user1)){
				$message = '';
				$email_id = $user1['email'];
				$id = $user1['id'];
				
				$pw = ""; 
				$pw = rand(100000,999999);
				$pass1 =$this->encrypt->encode($pw);
				//print_r($pass1); exit();
				$data['forgotupdate'] = $this->AccountModel->forgotupdate($id,$pass1);
				$to = $email_id;
				$subject = "Your password recovery";
				$message .= "New Password :".$pw;
				//print_r($message); exit();
 				$headers = "From: senery.ch";
				mail($to,$subject,$message,$headers);
				$this->session->set_flashdata('msg',"Thank You! Please check your email.");	
				            redirect('account', 'refresh');
			}else{
						 $this->session->set_flashdata('msg',"Incorrect Email Address");	
				            redirect('account/forgot', 'refresh');
		    }
		 }
		}	
	}
	
	public function activate($random){
		$user1 = $this->AccountModel->activate_user($random);
        $this->session->set_flashdata('msg',"Your account is activated.Please login to your account.");	
				            redirect('/', 'refresh');		
	}
	
	 
	/* public function registration(){
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('home', 'refresh');
		 }else{  
		  $this->load->helper('settings_helper');
		  $data['query']=$this->functions->getsettings();
	    $this->load->view('header');
		$this->load->view('registration');
		$this->load->view('footer');
		 }
	} */
	
	
	
}
