<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengetahui full_name dengan id_user
	function whoIs($id = FALSE){
		$ci =& get_instance();
		
		$ci->db->select('full_name');
		$ci->db->where('users.id', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('users');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
	            $output[]=$row['full_name'];
				return $output; //hasil
	        }
	    }else{
			return '-';
		}
	}
