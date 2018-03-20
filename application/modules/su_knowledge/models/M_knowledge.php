<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_knowledge extends CI_Model{
	protected $table = "knowledge_";
	var $column = array('knowledge_.id_knowledge',
						'knowledge_.code_knowledge',
						'knowledge_.id_user',
						'knowledge_.title_knowledge',
						'knowledge_.id_category',
						'knowledge_.content_knowledge',
						'knowledge_.tags_knowledge',
						'knowledge_.type_knowledge',
						'knowledge_.name_knowledge',
						'knowledge_.link_knowledge',
						'knowledge_.status_knowledge',

						);
	var $order = array('knowledge_.id_knowledge' => 'desc');

	function __construct(){
		parent::__construct();
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

	function get_datatables($id_user = FALSE, $status_knowledge = FALSE){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		//$ignore = array('root');
		$this->db->where('knowledge_.id_user', $this->id_user);
		if($status_knowledge){
			$this->db->where('knowledge_.status_knowledge', $status_knowledge);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($id_user = FALSE, $status_knowledge = FALSE){
		$this->db->from($this->table);
		if($id_user){$this->db->where('knowledge_.id_user',$id_user);}
		if($status_knowledge){$this->db->where('knowledge_.status_knowledge',$status_knowledge);}
		return $this->db->count_all_results();
	}

	public function get_by_id($id_user){
		$this->db->from($this->table);
		$this->db->where('knowledge_.id_user',$id_user);
		$query = $this->db->get();

		return $query->row();
	}

	function knowledge_view($id_knowledge=FALSE, $code_knowledge=FALSE, $status_knowledge=FALSE){
		if($id_knowledge==TRUE){$this->db->where('id_knowledge', $id_knowledge);return $this->db->get($this->table)->row_array();}
		if($code_knowledge==TRUE){$this->db->where('code_knowledge', $code_knowledge);return $this->db->get($this->table)->row_array();}
		if($status_knowledge==TRUE){$this->db->where('status_knowledge', $status_knowledge);return $this->db->get($this->table)->result_array();}
	}

	public function knowledge_save($id_user){
		// delete dahulu record yang contentnya NULL sebelum add knowledge yang baru
		//
		$this->db->where('knowledge_.id_user', $id_user); /*sesuai user*/
		$this->db->where('knowledge_.content_knowledge', NULL);
		$this->db->where('knowledge_.title_knowledge', NULL);
		$this->db->where('knowledge_.slug_knowledge', NULL);
		$this->db->where('knowledge_.tags_knowledge', NULL);
		$this->db->where('knowledge_.type_knowledge', NULL);
		$this->db->where('knowledge_.name_knowledge', NULL);
		$this->db->where('knowledge_.link_knowledge', NULL);
		$this->db->where('knowledge_.id_category', '0');
		$this->db->delete($this->table);

		$this->db->where('knowledge_.id_user', $id_user); /*sesuai user*/
		$this->db->where('knowledge_.slug_knowledge', 'n-a');
		$this->db->delete($this->table);

		$save = array(
			'code_knowledge' => uniqid(),
			'id_user' => $id_user,
			'title_knowledge' => NULL,
			'content_knowledge' => NULL,
			'tags_knowledge' => NULL,
			'type_knowledge'=> NULL,
			'name_knowledge'=> NULL,
			'link_knowledge'=> NULL,
			'status_knowledge' => 1,
			'create_knowledge' => humToun(),
			'update_knowledge' => NULL,
		);
		$this->db->insert($this->table, $save);
		return $this->db->insert_id();
	}

	public function knowledge_edit($where, $data){
		$this->db->where('knowledge_.id_knowledge',$where);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id_knowledge){
		$this->db->where('knowledge_.id_knowledge', $id_knowledge);
		$this->db->delete($this->table);
	}

	public function publish_($id_knowledge){
		$data = array(
			'status_knowledge' => 2, //ubah status knowledge
		);
		$this->db->where('knowledge_.id_knowledge',$id_knowledge);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}
	
	public function draft_($id_knowledge){
		$data = array(
			'status_knowledge' => 1, //ubah status knowledge
		);
		$this->db->where('knowledge_.id_knowledge',$id_knowledge);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	/* num rows */
	function get_knowledge_num(){
		$this->db->where('knowledge_.status_knowledge', 2);
		$this->db->where('knowledge_.content_knowledge IS NOT NULL', null, false);
		return $this->db->get($this->table)->num_rows();
	}


	/* for infinite scroll knowledge */
	public function get_all_count(){
        $sql = "SELECT COUNT(*) as tol_records FROM knowledge_ where status_knowledge=2 ";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	public function get_last_id(){
        $sql = "SELECT id_knowledge FROM knowledge_ ORDER BY id_knowledge DESC LIMIT 1";       
        $result = $this->db->query($sql)->row();
        return $result;
    }
	public function get_all_content($start,$content_per_page){
        $sql = "SELECT * FROM  knowledge_ where status_knowledge=2 ORDER BY id_knowledge DESC LIMIT $start,$content_per_page";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
}