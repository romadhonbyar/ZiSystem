<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_users_p extends CI_Model{
	protected $table = "users";
	var $column = array('users.id',
						'users.full_name',
						'users.phone',
						'users.email',
						'users.last_login',
						);
	var $order = array('users.id' => 'desc');

	function __construct(){
		parent::__construct();
	}
	
	public function get_by_id($username_url){
		$this->db->from($this->table);
		$this->db->where('users.username',$username_url);
		$this->db->join('users_detail', 'users.id = users_detail.id_user', 'left');
		$query = $this->db->get();

		return $query->row();
	}
}