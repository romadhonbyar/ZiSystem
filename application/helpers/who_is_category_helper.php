<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengetahui name_category dengan id_category
	function IsCategory($id = FALSE){
		$ci =& get_instance();
		
		$ci->db->select('name_category');
		$ci->db->where('knowledge_category.id_category', $id);
		$ci->db->limit(1);
		$query = $ci->db->get('knowledge_category');
	    if ($query->num_rows() > 0){
	        foreach($query->result_array() as $row){
	            $output[]=$row['name_category'];
				return $output; //hasil
	        }
	    }else{
			return '-';
		}
	}
