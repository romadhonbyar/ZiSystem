<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//untuk enkripsi ID
	function encodeID($id){
		$ci =& get_instance();
		$key = "k0pM4";
		$id_user_encode = $ci->encrypt->encode($id, $key, true);
		return $id_user_encode;
	}	
	function decodeID($id){
		$ci =& get_instance();
		$key = "k0pM4";
		$id_user_encode = $ci->encrypt->decode($id, $key, true);
		return $id_user_encode;
	}