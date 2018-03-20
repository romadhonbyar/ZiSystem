<?php defined('BASEPATH') OR exit('No direct script access allowed');
class C_users extends CI_Controller {
	public function index(){
		if ($this->ion_auth->logged_in()){
			redirect('dashboard', 'refresh');
		}else{redirect('login', 'refresh');}
	}
	
	public function ajax_list(){
		if ($this->ion_auth->logged_in()){
			$list = $this->m_users->get_datatables(); 
			$data = array(); $no = $_POST['start'];
			
			foreach ($list as $users) {				
				$no++;
				$row = array();
				$row[] = $users->full_name;
				if($users->username){ $add_username = $users->username; }
				else{ $add_username = "NULL"; }
				$row[] = $add_username;
				
				if($users->last_login){
					$last_login = unTohum($users->last_login);
				}else{ $last_login = "NULL"; }
				
				$row[] = $last_login;

				$id_encode = encodeID($users->id);
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('user/permissions/'.$id_encode).'" title="Manage permissions user" class="btn btn-info btn-xs btn-flat ">
						<i class="fa fa-key fa-fw"></i>
						</a>
					</div>';
				$row[] = '
					<div class="ui-group-buttons">
						<a href="'.site_url('user/edit/'.$id_encode).'" class="btn btn-danger btn-xs btn-flat ">Edit</a>
						<div class="or or-xs"></div>
						<a href="'.site_url('user/details/'.$id_encode).'" class="btn btn-info btn-xs btn-flat ">Details</a>
					</div>';
				$data[] = $row;
			}

			$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_users->count_all(),
						"recordsFiltered" => $this->m_users->count_filtered(),
						"data" => $data,
					);
			echo json_encode($output);		
		}		
	}

	public function ajax_edit($id_user){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_users->get_by_id($id_user);
			echo json_encode($data);
		}
	}
	
	public function ajax_users(){
		if ($this->ion_auth->logged_in()){
			$data = $this->m_get->get_users();
			echo json_encode($data);
		}
	}

	public function ajax_delete($id_users){
		if ($this->ion_auth->logged_in()){
			$this->m_users->delete_by_id($id_users);
			echo json_encode(array("status" => TRUE));
		}
	}
	
	/*
	private function _validate($jenis = FALSE){
		if ($this->ion_auth->logged_in()){
			$data = array();
			$data['error_string'] = array();
			$data['inputerror'] = array();
			$data['status'] = TRUE;

			
			if($jenis == "add"){
				$this->form_validation->set_rules('nama_users', 'Nama', 'trim|required|xss_clean|is_unique[data_users.nama_users]');
			}else{
				$this->form_validation->set_rules('nama_users', 'Nama', 'trim|required|xss_clean');
			}
			$this->form_validation->set_rules('id_users', 'users', 'trim|required|xss_clean');
			$this->form_validation->set_rules('deskripsi_users', 'Deskripsi', 'trim|required|min_length[10]|xss_clean');
			$this->form_validation->set_rules('jenis_users', 'Jenis', 'trim|required|xss_clean');
			
			if(!$this->form_validation->run()){
				$data['error_string'] = array(form_error('nama_users'),
											  form_error('id_users'),
											  form_error('deskripsi_users'),
											  form_error('jenis_users')
											  );
				$data['inputerror'] = array('nama_users',
											'id_users',
											'deskripsi_users',
											'jenis_users',
											);
				
				$data['status'] = FALSE;
			}

			if($data['status'] === FALSE){
				echo json_encode($data);
				exit();
			}
		} 
	} */
}