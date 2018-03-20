<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Auth.php
 *
 * @package     CI-ACL
 * @author      Steve Goodwin
 * @copyright   2015 Plumps Creative Limited
 */
class su_knowledge extends CI_Controller{

    function __construct(){
        parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        if( ! $this->ion_auth->logged_in() )
            redirect('/login');
		if( ! $this->ion_auth_acl->has_permission('menu_knowledge') )
            redirect('/dashboard');

		$this->url1 = $this->uri->rsegment(1);
		$this->url2 = $this->uri->rsegment(2);
		$this->url3 = $this->uri->rsegment(3);
		$this->url4 = $this->uri->rsegment(4);
		$this->url5 = $this->uri->rsegment(5);

		$user['user']=$this->ion_auth->user()->row();
		$this->id_user=$user['user']->id;
		$this->username=$user['user']->username;
		$this->full_name=$user['user']->full_name;

		$this->users_groups=$this->ion_auth->get_users_groups()->result();
    }

	public function index(){
		redirect('knowledge/draft');
	}

	public function add_knowledge(){
		$data = array(
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		$id_user = $this->id_user; /*id si usernya*/
		$data['title'] = "knowledge | Add knowledge";
		log_act("add", "add data knowledge");
		$last_id = $this->m_knowledge->knowledge_save($id_user);
		redirect('/knowledge/edit/'.encodeID($last_id), 'refresh');
	}

	public function update_knowledge(){
		$id_knowledge = decodeID($this->url3);
		if($id_knowledge == 0){show_404();}
		$data = array(
			'title' => "knowledge | Edit knowledge",
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'knowledge_data' => $this->m_knowledge->knowledge_view($id_knowledge,FALSE, 1),
			'category_data' => $this->m_knowledge_category->knowledge_category_view(),
			'message' => '',
		);
		$this->form_validation->set_rules('id_category', 'Category', 'required|xss_clean');
		$this->form_validation->set_rules('title_knowledge', 'Title', 'required|trim|xss_clean');
		$this->form_validation->set_rules('content_knowledge', 'Content', 'required|xss_clean');
		$this->form_validation->set_rules('tags_knowledge', 'Tags', 'required|xss_clean');
		$this->form_validation->set_rules('type_knowledge', 'Type link knowledge', 'required|xss_clean');
		$this->form_validation->set_rules('name_knowledge', 'Name knowledge', 'required|xss_clean');
		$this->form_validation->set_rules('link_knowledge', 'Link knowledge', 'required|valid_url|xss_clean');

		if($this->form_validation->run() === TRUE){
			$where = $this->input->post('id_knowledge');
			$data = array(
				'title_knowledge' => $this->input->post('title_knowledge'),
				'slug_knowledge' => slugify($this->input->post('title_knowledge')),
				'id_category' => $this->input->post('id_category'),
				'content_knowledge' => $this->input->post('content_knowledge'),
				'tags_knowledge' => $this->input->post('tags_knowledge'),
				'type_knowledge' => $this->input->post('type_knowledge'),
				'name_knowledge' => $this->input->post('name_knowledge'),
				'link_knowledge' => $this->input->post('link_knowledge'),
				'update_knowledge' => humToun(),
			);
			log_act("edit", "edit data knowledge (#".$where.")");
			$this->m_knowledge->knowledge_edit($where, $data);
			$this->session->set_flashdata('success', "Berhasil disimpan!");
			redirect('/knowledge/edit/'.encodeID($id_knowledge), 'refresh');
		}else{	
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
		}
		$this->_render_page('su_general/content/contents', 'su_knowledge/component/pages/pages-content/content', $data);
	}

	function autosave(){
		$id_knowledge = $this->input->post('id_knowledge');
		$code_knowledge = $this->input->post('code_knowledge');
		$content_knowledge = $this->input->post('content_knowledge');
		$data = array(
			'title_knowledge' => $this->input->post('title_knowledge'),
			'slug_knowledge' => slugify($this->input->post('title_knowledge')),
			'id_category' => $this->input->post('id_category'),
			'content_knowledge' => $content_knowledge,
			'tags_knowledge' => $this->input->post('tags_knowledge'),
			'link_knowledge' => $this->input->post('link_knowledge'),
			'name_knowledge' => $this->input->post('name_knowledge'),
			'type_knowledge' => $this->input->post('type_knowledge'),
			'update_knowledge' => humToun(),
		);
		$where = $id_knowledge;
		if($code_knowledge and $id_knowledge){
			if($id_knowledge == TRUE or 
			   $code_knowledge == TRUE or 
			   $title_knowledge == TRUE or 
			   $slug_knowledge == TRUE or 
			   $id_category == TRUE or 
			   $content_knowledge == TRUE or 
			   $tags_knowledge == TRUE or 
			   $link_knowledge == TRUE or 
			   $name_knowledge == TRUE or 
			   $type_knowledge == TRUE 
			   ){
				log_act("edit", "edit data knowledge (#".$id_knowledge.")");
				$this->m_knowledge->knowledge_edit($where, $data);
			} //else { show_404(); }
		}else{ show_404(); }
	}

	public function add_category(){
		/* Hanyu untuk yang diberi hak akses */
		if(!$this->ion_auth_acl->has_permission('menu_knowledge_category_add'))
            redirect('/dashboard');

		$data = array(
			'title' => "knowledge | Add category",
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		$this->form_validation->set_rules('name_category', 'Name', 'required|xss_clean');

		if($this->form_validation->run() === TRUE){
			$this->m_knowledge_category->knowledge_category_save();
			$this->session->set_flashdata('success', "Berhasil disimpan!");
			redirect('/knowledge/category', 'refresh');
		}else{	
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
		}
		$this->_render_page('su_general/content/contents', 'su_knowledge/component/pages/pages-content/content', $data);
	}

	public function update_category(){
		/* Hanyu untuk yang diberi hak akses */
		if($this->ion_auth_acl->has_permission('menu_knowledge_category'))
            redirect('/dashboard');
			
		$id_category = decodeID($this->url3);
		$data = array(
			'title' => "knowledge | Edit knowledge",
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'category_data' => $this->m_knowledge_category->knowledge_category_view($id_category),
			'message' => '',
		);
		$this->form_validation->set_rules('name_category', 'Name', 'required|xss_clean');

		if($this->form_validation->run() === TRUE){
			$this->m_knowledge_category->knowledge_category_edit($id_category);
			$this->session->set_flashdata('success', "Berhasil disimpan!");
			redirect('/knowledge/category', 'refresh');
		}else{	
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
		}
		$this->_render_page('su_general/content/contents', 'su_knowledge/component/pages/pages-content/content', $data);
	}

	public function data(){
		$data = array(
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
	
		if($this->url3 == "draft"){ 
			$data['title'] = "knowledge | Draft"; 
			log_act("read", "read data draft");
		}
		else if($this->url3 == "publish"){ 
			$data['title'] = "knowledge | Publish"; 
			log_act("read", "read data publish");
		}
		else if($this->url3 == "category"){ 
			$data['title'] = "knowledge | Category"; 
			log_act("read", "read data category");
		}

		$this->_render_page('su_general/content/contents', 'su_knowledge/component/pages/pages-content/content', $data);
	}

	function _render_page($view, $data=null, $returnhtml=false){ //I think this makes more sense
		$this->viewdata = (empty($data)) ? $data: $data;
		$view_html = $this->template->load($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}
