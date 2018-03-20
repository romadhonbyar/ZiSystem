<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// cek tanggal Expired
	function date_difference ($date_1, $date_2) {   
		$val_1 = new DateTime($date_1);
		$val_2 = new DateTime($date_2);

		$interval = $val_1->diff($val_2);
		$year     = $interval->y;
		$month    = $interval->m;
		$day      = $interval->d;

		$output   = '';

		/*
		if($year > 0){
			if ($year > 1){
				$output .= $year." years ";     
			} else {
				$output .= $year." year ";
			}
		}

		if($month > 0){
			if ($month > 1){
				$output .= $month." months ";       
			} else {
				$output .= $month." month ";
			}
		}

		if($day > 0){
			if ($day > 1){
				$output .= $day." days ";       
			} else {
				$output .= $day." day ";
			}
		}
		*/
		
		if($val_1 < $val_2 && $day == 0)
			$output.=	'AlmostOver';
		if($val_1 > $val_2)
			$output.= 'expired';
		return $output;
	}
	
	
	function date_difference_day ($date_1, $date_2) {   
		$val_1 = new DateTime($date_1);
		$val_2 = new DateTime($date_2);

		$interval = $val_1->diff($val_2);
		$year     = $interval->y;
		$month    = $interval->m;
		$day      = $interval->d;

		$output   = '';

		if($day > 0){
			if ($day > 1){
				$output .= $day;       
			} else {
				$output .= $day;
			}
		}
		
		return $output;
	}