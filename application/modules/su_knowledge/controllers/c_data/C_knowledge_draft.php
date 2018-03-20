<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_knowledge_draft extends CI_Controller {

    function __construct(){
        parent::__construct();
        if( ! $this->ion_auth->logged_in() )
            redirect('/login');
		if( ! $this->ion_auth_acl->has_permission('menu_knowledge') )
            redirect('/dashboard');

		$user['user']=$this->ion_auth->user()->row();
		$this->id_user=$user['user']->id;
		$this->username=$user['user']->username;
		$this->full_name=$user['user']->full_name;
    }


	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_knowledge->get_datatables($this->id_user, 1); // view untuk table draft
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $knowledge) {				
				$no++;
				$row = array();
				if($knowledge->title_knowledge){ $title_knowledge = $knowledge->title_knowledge; }
				else{ $title_knowledge = "<span style='color:#7F8C8D;'><i>NULL</i></span>"; }
				$row[] = wordwrap($title_knowledge);
				$row[] = IsCategory($knowledge->id_category);
				$row[] = $knowledge->viewed_knowledge;


				if($knowledge->status_knowledge == 1){ 
					$status_ = '<a href="javascript:void(0)" title="Publish knowledge" class="label label-primary" onclick="publish_('."'".$knowledge->id_knowledge."'".')">
							<i class="fa fa-check fa-fw"></i> Validasi
						</a>'; 
				} else { 
					$status_ = '<a href="javascript:void(0)" title="Draft knowledge" class="label label-primary" onclick="draft_('."'".$knowledge->id_knowledge."'".')">
							<i class="fa fa-check fa-fw"></i> Validasi
						</a>'; }
				
				$row[] = $status_;

				$id_encode = encodeID($knowledge->id_knowledge);
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('knowledge/edit/'.$id_encode).'" title="Edit knowledge" class="btn btn-success btn-xs btn-flat">
							<i class="fa fa-pencil fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="javascript:void(0)" title="Delete knowledge" class="btn btn-danger btn-xs btn-flat" onclick="delete_person('."'".$knowledge->id_knowledge."'".')">
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>';
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_knowledge->count_all(),
						"recordsFiltered" => $this->m_knowledge->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_edit($id_user){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_knowledge->get_by_id($id_user);
			echo json_encode($data);
		}
	}
	
	public function ajax_knowledge(){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_get->get_knowledge();
			echo json_encode($data);
		}
	}

	public function ajax_delete($id_knowledge){
		if ($this->ion_auth->logged_in()){
			$this->m_knowledge->delete_by_id($id_knowledge);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_draft($id_knowledge){
		if ($this->ion_auth->logged_in()){
			$this->m_knowledge->draft_($id_knowledge);
			echo json_encode(array("status" => TRUE));
		}
	}
}