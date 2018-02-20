<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	  
	   if (isset($_POST['user_login'])){
		      $check['email'] = $this->input->post('emauil_us');
			  $user = $this->AccountModel->is_user('user',$check);
			  $check_status = $this->AccountModel->check_user($user);
			  if (!empty($check_status)){
			    if (!empty($user)){
						  $hase = $user['password'];
						  $pass =$this->encrypt->decode($hase);
						  
						   if($pass == $this->input->post('pass_us')){
							$remember = $this->input->post('remember_me');
							//print_r($remember); exit();
							if ($remember){

							
								$this->session->set_userdata('remember_me', TRUE);
								$sess_data = array(
								'email' => $user['email'],
								'password' => $pass,
								);
								$re = $this->session->set_userdata('sess_data',$sess_data);
							}   
							$session_user = array(
							 'logged_in' => TRUE, 
							  'user_type' =>$user['user_type'],
							  'name' => $user['name'],
							  'user_id' => $user['id'],
							  'email' =>$user['email'],
							  );
						$a = $this->session->set_userdata('user_details',$session_user);
						//print_r($a); exit();
						if($user['user_type'] == 'admin'){
						   redirect('homeadmin');
						}
						elseif($user['user_type'] == 'user'){
							redirect('homeuser');
						}
						elseif($user['user_type'] == 'customer'){
							redirect('homecustomer');
						}
					}else{
							$this->session->set_flashdata('msg',"Incorrect Email/Password or Blocked user");	
				            redirect('account', 'refresh');
						}	
					}else {
						 $this->session->set_flashdata('msg'," Incorrect Email Id.");	
				         redirect('account', 'refresh');
					}
	             }else{
				 
					        $code = $user['code'];
							$to = $user['email'];
							
							$subject = "Activation";				            
							$message = "<p>Hello,</p><p>Please click on this link to activate.- </p>";
							$message .="<a href='http://users.senery.ch/account/activate/".$code."'>Link</a>"; 
							// Always set content-type when sending HTML email
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				
							// More headers
							$headers .= 'From: User Senery <user@senery.com>' . "\r\n";							
				
							mail($to,$subject,$message,$headers);
						  //  print_r($to );print_r($subject );print_r($message );print_r($headers );
						//	print_r(mail($to,$subject,$message,$headers));
							$this->session->set_flashdata('msg',"Sorry! Your account is inactive. Please activate from your Email");	
				            redirect('account', 'refresh');
				 }
	     }
	}
	public function logout()
	{
		$session_user = array(
					  'logged_in' => FALSE, 
					  'user_type' =>'',
					  'name' => '',
					  'user_id' => '',
					  'email' => '',
					  
				  );

		$this->session->unset_userdata('user_details');
		 //$this->session->sess_destroy();
        redirect('account','refresh');
	}
	
	
	 
	
}
