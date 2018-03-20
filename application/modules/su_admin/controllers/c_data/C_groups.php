<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_groups extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_groups->get_datatables(); 
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $v_groups) {				
				$no++;
				$row = array();
				$row[] = $v_groups->id;
				$row[] = $v_groups->name;
				$row[] = $v_groups->description;
				
				/* add html for action */
				
				$id_encode = encodeID($v_groups->id);
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('group/permissions/'.$id_encode).'" title="Manage permissions group" class="btn btn-info btn-xs btn-flat ">
							&nbsp;&nbsp;&nbsp;<i class="fa fa-key fa-fw"></i>&nbsp;&nbsp;&nbsp;
						</a>
					</div>';

				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('group/edit/'.$id_encode).'" title="Edit group" class="btn btn-success btn-xs btn-flat">
							<i class="fa fa-pencil fa-fw"></i>
						</a>
						<div class="or or-xs"></div>
						<a href="javascript:void(0)" title="Delete group" class="btn btn-danger btn-xs btn-flat" onclick="delete_person('."'".$v_groups->id."'".')">
							<i class="fa fa-trash fa-fw"></i>
						</a>
					</div>';
					
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_groups->count_all(),
						"recordsFiltered" => $this->m_groups->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_delete($id_groups){
		if ($this->ion_auth->logged_in()){
			$this->m_groups->delete_by_id($id_groups);
			echo json_encode(array("status" => TRUE));
		}
	}
}