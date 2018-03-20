<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//untuk setting datetime

	function date_time(){
		$output = gmdate('Y-m-d H:i:s', time()+60*60*7);
		return $output; //hasil 
	}