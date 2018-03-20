<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_logs extends CI_Model{
	function __construct(){
		parent::__construct();
    }
    
	function log_activity($param){
        $sql        = $this->db->insert_string('log_activity',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
}