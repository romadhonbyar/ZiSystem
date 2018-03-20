<?php if(!defined('BASEPATH')) exit('Hacking Attempt: Keluar dari sistem...!');
class M_set_seo extends CI_Model{
	protected $table = "set_seo";
	function __construct(){
		parent::__construct();
	}
	function seo_view($id_set_seo=FALSE){
		if($id_set_seo==TRUE){$this->db->where('id_set_seo', $id_set_seo);}		
		return $this->db->get($this->table)->row_array();
	}
	function seo_row($id_set_seo=FALSE){
		if($id_set_seo==TRUE){$this->db->where('id_set_seo', $id_set_seo);}
		return $this->db->get($this->table)->num_rows();
	}
	// save data seo
	function seo_save(){
		$save = array(
			'meta_description' => $this->input->post('meta_description'),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_author' => $this->input->post('meta_author'),
			'meta_google_verification' => $this->input->post('meta_google_verification'),
			'meta_google_analytics_verification' => $this->input->post('meta_google_analytics_verification'),
			'meta_bing_verification' => $this->input->post('meta_bing_verification'),
			'meta_alexa_verification' => $this->input->post('meta_alexa_verification'),
		);
		$go = $this->db->insert($this->table, $save);
		return $go;
	}
	// edit data seo
	function seo_edit(){
		$edit = array(
			'meta_description' => $this->input->post('meta_description'),
			'meta_keywords' => $this->input->post('meta_keywords'),
			'meta_author' => $this->input->post('meta_author'),
			'meta_google_verification' => $this->input->post('meta_google_verification'),
			'meta_google_analytics_verification' => $this->input->post('meta_google_analytics_verification'),
			'meta_bing_verification' => $this->input->post('meta_bing_verification'),
			'meta_alexa_verification' => $this->input->post('meta_alexa_verification'),
		);	
		$this->db->where($this->table.'.id_set_seo', 1);
		$go = $this->db->update($this->table, $edit);
		return $go;
	}
}