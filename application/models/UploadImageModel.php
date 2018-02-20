<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadImageModel extends CI_Model {
    public  function __construct() {
		parent::__construct();
	}		
    public function insertimage($img_name,$userid){
	                  $data = array(
					   'user_id' => $userid,
                       'thumbs_image' =>  $img_name,
						);
						//print_r($data); exit();
						 $this->db->insert('uplodaimage',$data);
						  $this->session->set_flashdata('msg',"Image uploaded successfully");
					      redirect('imageupload','refresh');
                   }
}
	

	