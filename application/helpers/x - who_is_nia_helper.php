<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengetahui NIA dengan id_user
	function whoIsNia($id = FALSE){
		$ci =& get_instance();
		
		$ci->db->select('nia');
		$ci->db->where('users_detail.id_user', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('users_detail');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
	            $output[]=$row['nia'];
				return $output; //hasil
	        }
	    }else{
			return '-';
		}
	}
