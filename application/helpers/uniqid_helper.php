<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//untuk mengetahui bulan bulan

	function unique(){
		$unique = substr(uniqid(rand(), true), 5, 5);
		return $unique; //hasil 
	}