<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
		$this->load->library('form_validation'); 
		$this->load->helper('settings_helper');
		if(!empty($this->session->userdata("user_details"))){
			redirect('account');
		 }
        }
    public function index(){
	}
	public function ajax_call_pop_district_data(){
		
		$id=$_REQUEST['q'];
		$res=$this->RegistrationModel->getcity($id,'states');
		$details="<select name='cityshipment' class='input_form_sign d_block  active_inp tyle_add' style='width: 100%'>";
			$details.="<option value=''>City</option>";
			foreach($res as $values) { 
			$details.="<option value=\"".$values['id']."\">".$values['name']."</option>";
			   }
			$details.="</select>";
			echo $details;
	
		
	}
	public function pop_district_data(){
		
			$id=$_REQUEST['country_id'];
			$res=$this->RegistrationModel->getcity1($id,'states');
		$details="<select name='citybilling' class='input_form_sign d_block  active_inp tyle_add' style='width: 100%'  >";
			$details.="<option value=''>City</option>";
			foreach($res as $values) { 
			$details.="<option value=\"".$values['id']."\">".$values['name']."</option>";
			   }
			$details.="</select>";
			echo $details;
		
	}
    public function user(){
		  if(isset($_POST['email'])){
			if($this->RegistrationModel->checkemailStatus($this->input->post('email')) == false){
			
				//print_r($_POST); exit();
			  $email = $this->input->post('email');
			  $pass = $this->input->post('pass');
			  $pass1 =$this->encrypt->encode($pass);
			  //print_r($pass1); exit();
			  $datepicker = $this->input->post('datepicker');
			  $user_type = $this->input->post('user_type');
			  $status = 0;
			  $pw = ""; 
			  $pw = rand(1000,9999);
			  $code = $pw; 
			  //print_r($code); exit();
			
			$data = array(
			'email'=>$email,
			'password'=>$pass1,
			'dob'=>$datepicker,
			'user_type'=>$user_type,
			'status'=>$status,
			'code'=>$code,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
           );
		 //  print_r($data);
             $sign_up['insert_id']=$this->RegistrationModel->getsign_up($data);
			 if(isset($_POST['usersign'])){
			 $sign_up1['insertid']=$this->RegistrationModel->getsignup($sign_up);
			 }
			 /************ Mail ********************/
			$to = $email;
			$subject = "Registration";

			$message = "<p>Hello,</p><p>You have successfully registered.Please click on this link to activate.- </p>";
			$message .="<a href='http://users.senery.ch/account/activate/".$code."'>Link</a>"; 
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: User Senery <user@senery.com>' . "\r\n";
			

			mail($to,$subject,$message,$headers);
			 $this->session->set_flashdata('msg',"User added successfully. Please check your E-mail.");
             redirect('account','refresh');	
			}else{
               $this->session->set_flashdata('msg',"Email already exist");
                   redirect('registration/user');
		  }
		}
		  $data['country'] = $this->RegistrationModel->getcountry();
		   $key="USER_ADDRESS_REQUEST";
		  $data['user_setting']=$this->RegistrationModel->get_user_setting($key);
		  $data['password_length']=$this->RegistrationModel->get_user_setting('MINIMAL_PASSWORD_LENGTH');
		  $data['mini_birth']=$this->RegistrationModel->get_user_setting('MINIMAL_BIRTHDAY_DAY');
		  
		  $data['content'] = $this->load->view('registration/user_registration',$data,true);
		  $this->load->view('layout',$data);
	}	
		 
	public function customer(){
		    if(isset($_POST['email'])){
			if($this->RegistrationModel->checkemailStatus($this->input->post('email')) == false){
			
				//print_r($_POST); exit();
			  $email = $this->input->post('email');
			  $pass = $this->input->post('pass');
			  $pass1 =$this->encrypt->encode($pass);
			  //print_r($pass1); exit();
			  $datepicker = $this->input->post('datepicker');
			  $user_type = $this->input->post('user_type');
			  $status = 0;
			  $pw = ""; 
			  $pw = rand(1000,9999);
			  $code = $pw; 
			  //print_r($code); exit();
			
			$data = array(
			'email'=>$email,
			'password'=>$pass1,
			'dob'=>$datepicker,
			'user_type'=>$user_type,
			'status'=>$status,
			'code'=>$code,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
           );
		 //  print_r($data);
             $sign_up['insert_id']=$this->RegistrationModel->getsign_up($data);
			 if(isset($_POST['usersign'])){
			 $sign_up1['insertid']=$this->RegistrationModel->getsignup($sign_up);
			 }
			 /************ Mail ********************/
			$to = $email;
			$subject = "Registration";

			$message = "<p>Hello,</p><p>You have successfully registered.Please click on this link to activate.- </p>";
			$message .="<a href='http://users.senery.ch/account/activate/".$code."'>Link</a>"; 
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: User Senery <user@senery.com>' . "\r\n";
			

			mail($to,$subject,$message,$headers);
			 $this->session->set_flashdata('msg',"User added successfully. Please check your E-mail.");
             redirect('account','refresh');	
			}else{
               $this->session->set_flashdata('msg',"Email already exist");
                   redirect('registration/customer');
		   }
		  }
		  $data['country'] = $this->RegistrationModel->getcountry();
		  $key="CUSTOMER_ADDRESS_REQUEST";
		  $data['user_setting']=$this->RegistrationModel->get_user_setting($key);
		  $data['password_length']=$this->RegistrationModel->get_user_setting('MINIMAL_PASSWORD_LENGTH');
		  $data['mini_birth']=$this->RegistrationModel->get_user_setting('MINIMAL_BIRTHDAY_DAY');
		  $data['content'] = $this->load->view('registration/customer_registration',$data,true);
		  $this->load->view('layout',$data);
		
	}
   public function admin(){
		   if(isset($_POST['email'])){
			if($this->RegistrationModel->checkemailStatus($this->input->post('email')) == false){
			
				//print_r($_POST); exit();
			  $email = $this->input->post('email');
			  $pass = $this->input->post('pass');
			  $pass1 =$this->encrypt->encode($pass);
			  //print_r($pass1); exit();
			  $datepicker = $this->input->post('datepicker');
			  $user_type = $this->input->post('user_type');
			  $status = 0;
			  $pw = ""; 
			  $pw = rand(1000,9999);
			  $code = $pw; 
			  //print_r($code); exit();
			
			$data = array(
			'email'=>$email,
			'password'=>$pass1,
			'dob'=>$datepicker,
			'user_type'=>$user_type,
			'status'=>$status,
			'code'=>$code,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
           );
		 //  print_r($data);
             $sign_up['insert_id']=$this->RegistrationModel->getsign_up($data);
			 if(isset($_POST['usersign'])){
			 $sign_up1['insertid']=$this->RegistrationModel->getsignup($sign_up);
			 }
			 /************ Mail ********************/
			$to = $email;
			$subject = "Registration";

			$message = "<p>Hello,</p><p>You have successfully registered.Please click on this link to activate.- </p>";
			$message .="<a href='http://users.senery.ch/account/activate/".$code."'>Link</a>"; 
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: User Senery <user@senery.com>' . "\r\n";
			

			mail($to,$subject,$message,$headers);
			 $this->session->set_flashdata('msg',"User added successfully. Please check your E-mail.");
			// echo $this->session->flashdata('msg');
             redirect('account');	
			}else{
               $this->session->set_flashdata('msg',"Email already exist");
                   redirect('registration/admin');
		  }
		  }
		  $data['country'] = $this->RegistrationModel->getcountry();
          $key="ADMIN_ADDRESS_REQUEST";
		  $data['user_setting']=$this->RegistrationModel->get_user_setting($key);
		  $data['password_length']=$this->RegistrationModel->get_user_setting('MINIMAL_PASSWORD_LENGTH');
		  $data['mini_birth']=$this->RegistrationModel->get_user_setting('MINIMAL_BIRTHDAY_DAY');
		  $data['content'] = $this->load->view('registration/admin_registration',$data,true);
		  $this->load->view('layout',$data);
		
	}	
	public function check_email(){
		$this->form_validation->set_rules('email', 'Email', 'callback_rolekey_exists');
		 if ($this->form_validation->run() == FALSE){
			echo "error"; 
		 }else{
			echo "not error";
		 }
	}		
	function rolekey_exists($key) {
     $eml=$this->RegistrationModel->mail_exists($key);
	 return $eml;
    }	 
	public function get_pass_length(){
		$pass_len=$this->RegistrationModel->get_pass_length();
		echo $pass_len;
	}	
    public function get_dob(){
		$dob=$this->RegistrationModel->get_dob();
        echo $dob;		
    }
    public function check_user(){
		if($_POST['user_type']=='customer'){
			$key="CUSTOMER_ADDRESS_REQUEST";
			$user_setting=$this->RegistrationModel->get_user_setting($key);
			echo $user_setting;
		}
		if($_POST['user_type']=='user'){
			$key="USER_ADDRESS_REQUEST";
			$user_setting=$this->RegistrationModel->get_user_setting($key);
			echo $user_setting;
		}
		if($_POST['user_type']=='admin'){
			$key="ADMIN_ADDRESS_REQUEST";
			$user_setting=$this->RegistrationModel->get_user_setting($key);
			echo $user_setting;
		}
    }		
}		 
?>		 