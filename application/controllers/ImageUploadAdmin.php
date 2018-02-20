<?php
ob_start();
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageUploadAdmin extends CI_Controller {

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
		$this->load->model('UploadImageModel');
       
        //$this->load->library('image_moo') ;
         }
	public function index() {
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{ 
			$this->load->view('headerAdmin');
			$this->load->view('imageuploadadmin');
			$this->load->view('footerAdmin');
		}
    }	
	
	public function post() {
	    //print_r($_POST);
		// print_r($_FILES);
		$data['userdata'] = $this->session->userdata("user_details");
		 if(!isset($data['userdata'])){
			redirect('account', 'refresh');
		 }else{
		  $uid = $data['userdata'];
		 //print_r($uid); exit();
		 $userid  = $uid['user_id'];	 
		 define('UPLOAD_DIR', 'public/upload/thumbs/');
		$img = $_POST['new_img'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$img_name =  uniqid() . '.png';
		$file = UPLOAD_DIR . $img_name;
		$success = file_put_contents($file, $data);
		//print $success ? $file : 'Unable to save the file.';
		$this->resize($file, $file, 200, 80);
		 $result['query']=$this->UploadImageModel->insertimage($img_name,$userid);
		 }	
	   } 
				
			
	function resize($source_image, $destination, $tn_w, $tn_h, $quality = 100, $wmsource = false)
		    {
			$info = getimagesize($source_image);
			$imgtype = image_type_to_mime_type($info[2]);
		
			#assuming the mime type is correct
			switch ($imgtype) {
				case 'image/jpeg':
					$source = imagecreatefromjpeg($source_image);
					break;
				case 'image/gif':
					$source = imagecreatefromgif($source_image);
					break;
				case 'image/png':
					$source = imagecreatefrompng($source_image);
					break;
				default:
					die('Invalid image type.');
			}
		
			#Figure out the dimensions of the image and the dimensions of the desired thumbnail
			$src_w = imagesx($source);
			$src_h = imagesy($source);
		
		
			#Do some math to figure out which way we'll need to crop the image
			#to get it proportional to the new size, then crop or adjust as needed
		
			$x_ratio = $tn_w / $src_w;
			$y_ratio = $tn_h / $src_h;
		
			if (($src_w <= $tn_w) && ($src_h <= $tn_h)) {
				$new_w = $src_w;
				$new_h = $src_h;
			} elseif (($x_ratio * $src_h) < $tn_h) {
				$new_h = ceil($x_ratio * $src_h);
				$new_w = $tn_w;
			} else {
				$new_w = ceil($y_ratio * $src_w);
				$new_h = $tn_h;
			}
		
			$newpic = imagecreatetruecolor(round($new_w), round($new_h));
			imagecopyresampled($newpic, $source, 0, 0, 0, 0, $new_w, $new_h, $src_w, $src_h);
			$final = imagecreatetruecolor($tn_w, $tn_h);
			$backgroundColor = imagecolorallocate($final, 255, 255, 255);
			imagefill($final, 0, 0, $backgroundColor);
			//imagecopyresampled($final, $newpic, 0, 0, ($x_mid - ($tn_w / 2)), ($y_mid - ($tn_h / 2)), $tn_w, $tn_h, $tn_w, $tn_h);
			imagecopy($final, $newpic, (($tn_w - $new_w)/ 2), (($tn_h - $new_h) / 2), 0, 0, $new_w, $new_h);
		
			#if we need to add a watermark
			if ($wmsource) {
				#find out what type of image the watermark is
				$info    = getimagesize($wmsource);
				$imgtype = image_type_to_mime_type($info[2]);
		
				#assuming the mime type is correct
				switch ($imgtype) {
					case 'image/jpeg':
						$watermark = imagecreatefromjpeg($wmsource);
						break;
					case 'image/gif':
						$watermark = imagecreatefromgif($wmsource);
						break;
					case 'image/png':
						$watermark = imagecreatefrompng($wmsource);
						break;
					default:
						die('Invalid watermark type.');
				}
		
				#if we're adding a watermark, figure out the size of the watermark
				#and then place the watermark image on the bottom right of the image
				$wm_w = imagesx($watermark);
				$wm_h = imagesy($watermark);
				imagecopy($final, $watermark, $tn_w - $wm_w, $tn_h - $wm_h, 0, 0, $tn_w, $tn_h);
		
			}
			if (imagejpeg($final, $destination, $quality)) {
				return true;
			}
			return false;
		}
			

}