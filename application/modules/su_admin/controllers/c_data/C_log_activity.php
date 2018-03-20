<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_log_activity extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dasbor', 'refresh');
		}else{redirect('ana', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_log_activity->get_datatables(); 
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $v_log_activity) {				
				$no++;
				$row = array();
				$row[] = '#'.$v_log_activity->id_log_activity;
				$row[] = $v_log_activity->log_ip;
				$row[] = $v_log_activity->log_username;
				$row[] = $v_log_activity->log_type;
				$row[] = $v_log_activity->log_desc;
				$row[] = $v_log_activity->log_datetime;
				
				/* add html for action */
				$row[] = '
					<div class="btn-group btn-input clearfix dropdown">
						<a href="#" class="btn btn-primary btn-xs btn-flat"title="Aksi">
							Aksi
						</a>
						<button type="button" data-toggle="dropdown" class="btn btn-primary btn-xs btn-flat dropdown-toggle"><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="'.base_url('/log_activity/edit/'.$v_log_activity->id_log_activity).'" title="Edit Schedule">
									<i class="fa fa-edit fa-fw"></i>Edit
								</a>
							</li>
							<li>
								<a href="javascript:void(0)" title="Delete Schedule" onclick="delete_person('."'".$v_log_activity->id_log_activity."'".')">
									<i class="fa fa-trash fa-fw"></i>Delete
								</a>
							</li>
						</ul>
					</div>				
				';
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_log_activity->count_all(),
						"recordsFiltered" => $this->m_log_activity->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_delete($id_log_activity){
		if ($this->ion_auth->logged_in()){
			$this->m_log_activity->delete_by_id($id_log_activity);
			echo json_encode(array("status" => TRUE));
		}
	}
}