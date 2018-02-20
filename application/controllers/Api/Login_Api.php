<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Api extends CI_Controller {

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
	
	
	
	public  function index() {
	   
        $user_id = json_decode(file_get_contents("php://input"));
        //print_r($user_id);
	    $check['email'] = $user_id->email;
	    //$password = $user_id->password;
		$user = $this->AccountModel->is_user('user',$check);
		//print_r($user); exit();
		$check_status = $this->AccountModel->check_user($user);
		if(!empty($check_status)){
			if(!empty($user)){
				          $hase = $user['password'];
						  $pass =$this->encrypt->decode($hase);
						  if($pass == $user_id->password){
							  $id  = $user['id'];
							  $pass1 =$this->encrypt->encode($id);
							  $data = array(
									'user_id'=>$id,
									'token'=>$pass1,
									'created_at' => date('Y-m-d h:i:s'),
			                        'updated_at' => date('Y-m-d h:i:s'),
									);   
							  $login['tokent_id']=$this->AccountModel->gettoken($data);
							 
							 $addresses = array('user_id'=>$id, 'tokent'=>$pass1,'status'=>'ok');
							 //print_r($addresses);
						   }else{
							  $addresses = array('status'=>'Invalid login');
						   }
			}else{
				              $addresses = array('status'=>'Invalid login');
			}
		}else{
			$addresses = array('status'=>'Invalid login');
		}
		echo json_encode($addresses);
     }
}
