<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_set_general extends CI_Model{
	protected $table = "set_general";
	function __construct(){
		parent::__construct();
	}
	function general_view($id_set_general=FALSE){
		if($id_set_general==TRUE){$this->db->where('id_set_general', $id_set_general);}		
		return $this->db->get($this->table)->row_array();
	}
	function general_row($id_set_general=FALSE){
		if($id_set_general==TRUE){$this->db->where('id_set_general', $id_set_general);}
		return $this->db->get($this->table)->num_rows();
	}
	// save data seo
	function general_save(){
		$save = array(
			//'maintenance' => $this->input->post('maintenance'),
			'name_web' => $this->input->post('name_web'),
			'slogan_web' => $this->input->post('slogan_web'),
			//'about_short_web' => htmlentities($this->input->post('slogan_web')),
		);
		$go = $this->db->insert($this->table, $save);
		return $go;
	}
	// edit data seo
	function general_edit(){
		$edit = array(
			//'maintenance' => $this->input->post('maintenance'),
			'name_web' => $this->input->post('name_web'),
			'slogan_web' => $this->input->post('slogan_web'),
			//'about_short_web' => htmlentities($this->input->post('slogan_web')),
		);	
		$this->db->where($this->table.'.id_set_general', 1);
		$go = $this->db->update($this->table, $edit);
		return $go;
	}
}