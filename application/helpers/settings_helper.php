<?php
function get_settings($id){
	$ci = & get_instance();
    $ci->load->database();
    //$result = array();
	 $ci->db->select('*');   	    	
    $ci->db->from('settings');
	$ci->db->where('id',$id);
	$query = $ci->db->get();
	$res=$query->row_array();
	//print_r($res); exit();
	return $res['value'];
	
}



?>