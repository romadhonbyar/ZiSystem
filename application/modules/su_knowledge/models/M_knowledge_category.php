<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_knowledge_category extends CI_Model{
	protected $table = "knowledge_category";
	var $column = array('knowledge_category.id_category',
						'knowledge_category.code_category',
						'knowledge_category.name_category',
						'knowledge_category.slug_category',
						);
	var $order = array('knowledge_category.id_category' => 'desc');

	function __construct(){
		parent::__construct();
		if ($this->ion_auth->logged_in()){
			$user=$this->ion_auth->user()->row();
			$this->id_user=$user->id;
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
		$this->db->where('knowledge_category.id_user',$id_user);
		$query = $this->db->get();

		return $query->row();
	}

	function knowledge_category_view($id_category=FALSE){
		if($id_category==TRUE){$this->db->where('id_category', $id_category);}		
		return $this->db->get($this->table)->result_array();
	}

	public function knowledge_category_save(){
		$save = array(
			'code_category' => uniqid(),
			'name_category' => $this->input->post('name_category'),
			'slug_category' => $this->input->post('slug_category'),
		);
		$this->db->insert($this->table, $save);
		return $this->db->insert_id();
	}

	public function knowledge_category_edit($where){
		$save = array(
			'name_category' => $this->input->post('name_category'),
			'slug_category' => $this->input->post('slug_category'),
		);
		$this->db->where('knowledge_category.id_category',$where);
		$this->db->update($this->table, $save);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_category){
		$this->db->where('knowledge_category.id_category', $id_category);
		$this->db->delete($this->table);
	}
}