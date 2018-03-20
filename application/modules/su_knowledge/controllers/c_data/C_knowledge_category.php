<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_knowledge_category extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_knowledge_category->get_datatables(); 
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $category) {				
				$no++;
				$row = array();
				$row[] = $category->code_category;
				$row[] = $category->name_category;
				$row[] = $category->slug_category;

				$id_encode = encodeID($category->id_category);
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('category/edit/'.$id_encode).'" title="Edit category" class="btn btn-success btn-xs btn-flat">
							<i class="fa fa-pencil fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="javascript:void(0)" title="Delete category" class="btn btn-danger btn-xs btn-flat" onclick="delete_person('."'".$category->id_category."'".')">
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>';
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_knowledge_category->count_all(),
						"recordsFiltered" => $this->m_knowledge_category->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_edit($id_user){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_knowledge_category->get_by_id($id_user);
			echo json_encode($data);
		}
	}
	
	public function ajax_category(){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_get->get_category();
			echo json_encode($data);
		}
	}

	public function ajax_delete($id_category){
		if ($this->ion_auth->logged_in()){
			$this->m_knowledge_category->delete_by_id($id_category);
			echo json_encode(array("status" => TRUE));
		}
	}
}