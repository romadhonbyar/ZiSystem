<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_set_socmed extends CI_Model{
	protected $table = "set_socmed";
	function __construct(){
		parent::__construct();
	}
	function socmed_view($id_set_socmed=FALSE){
		if($id_set_socmed==TRUE){$this->db->where('id_set_socmed', $id_set_socmed);}		
		return $this->db->get($this->table)->row_array();
	}
	function socmed_row($id_set_socmed=FALSE){
		if($id_set_socmed==TRUE){$this->db->where('id_set_socmed', $id_set_socmed);}
		return $this->db->get($this->table)->num_rows();
	}
	// save data socmed
	function socmed_save(){
		$save = array(
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'google_plus' => $this->input->post('google_plus'),
			'instagram' => $this->input->post('instagram'),
			'youtube' => $this->input->post('youtube'),
			'whatsapp' => $this->input->post('whatsapp'),
		);
		$go = $this->db->insert($this->table, $save);
		return $go;
	}
	// edit data socmed
	function socmed_edit(){
		$edit = array(
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'google_plus' => $this->input->post('google_plus'),
			'instagram' => $this->input->post('instagram'),
			'youtube' => $this->input->post('youtube'),
			'whatsapp' => $this->input->post('whatsapp'),
		);	
		$this->db->where($this->table.'.id_set_socmed', 1);
		$go = $this->db->update($this->table, $edit);
		return $go;
	}
}