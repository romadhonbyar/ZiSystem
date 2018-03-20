<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_permissions extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_permissions->get_datatables(); 
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $v_permissions) {				
				$no++;
				$row = array();
				//$row[] = "#".$v_permissions->id;
				$row[] = $v_permissions->perm_key;
				$row[] = $v_permissions->perm_name;
				
				/* add html for action */
				
				$id_encode = encodeID($v_permissions->id);
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('permission/edit/'.$id_encode).'" title="Edit permission" class="btn btn-success btn-xs btn-flat">
							<i class="fa fa-pencil fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="javascript:void(0)" title="Delete permission" class="btn btn-danger btn-xs btn-flat" onclick="delete_person('."'".$v_permissions->id."'".')">
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>';
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_permissions->count_all(),
						"recordsFiltered" => $this->m_permissions->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_delete($id_permissions){
		if ($this->ion_auth->logged_in()){
			$this->m_permissions->delete_by_id($id_permissions);
			echo json_encode(array("status" => TRUE));
		}
	}
}