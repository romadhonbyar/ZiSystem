<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_log_activity extends CI_Model{
	protected $table = "log_activity";
	var $column = array(
						'log_activity.id_log_activity',
						'log_activity.id_user',
						'log_activity.log_ip',
						'log_activity.log_username',
						'log_activity.log_type',
						'log_activity.log_desc',
						'log_activity.log_datetime',
						);
	var $order = array('log_activity.id_log_activity' => 'desc');

	function __construct(){
		parent::__construct();
	}

	private function _get_datatables_query(){
		$this->db->from($this->table);
		if(!$this->ion_auth_acl->has_permission('admin_access') ){
			$this->db->where('id_user',$this->session->userdata('user_id'));
		}
		$i = 0;
	
		foreach ($this->column as $item){
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order'])){
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if(isset($this->order)){
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id_log_activity){
		$this->db->from($this->table);
		$this->db->where('id_log_activity',$id_log_activity);
		$query = $this->db->get();
		return $query->row();
	}
}