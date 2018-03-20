<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_users extends CI_Model{
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
		if ($this->ion_auth->logged_in()){
			$user=$this->ion_auth->user()->row();
			$this->username=$user->username;
		}
	}

	private function _get_datatables_query(){
		$this->db->from($this->table);		
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
		//$ignore = array('root');
		//$this->db->where_not_in('username', $this->username);
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

	public function get_by_id($id_user){
		$this->db->from($this->table);
		$this->db->where('users.id',$id_user);
		$this->db->join('users_detail', 'users.id = users_detail.id_user', 'left');
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data){
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_user){
		$this->db->where('users.id', $id_user);
		$this->db->delete($this->table);
	}
}