<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk mengetahui bulan bulan
	function log_act($tipe = "", $str = ""){
		$CI =& get_instance();
		/**
		 * login
		 * logout
		 * add
		 * edit
		 * read
		 * validasi
		 * download
		 * report
		 */
	 
		// paramter
		$param['id_user']       = $CI->session->userdata('user_id');
		$param['log_username']  = $CI->session->userdata('username');
		$param['log_ip']        = $CI->input->ip_address();
		$param['log_type']      = strtolower($tipe);
		$param['log_desc']      = $str;
		$param['log_datetime']  = date_time();
		
		//save to database
		$CI->m_logs->log_activity($param);
	}