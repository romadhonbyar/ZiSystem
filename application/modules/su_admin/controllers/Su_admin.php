<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Auth.php
 *
 * @package     CI-ACL
 * @author      Steve Goodwin
 * @copyright   2015 Plumps Creative Limited
 */
class su_admin extends CI_Controller{

    function __construct(){
        parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        if( ! $this->ion_auth->logged_in() )
            redirect('/login');

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
		redirect('dashboard');
	}
	public function dashboard(){
		$id_decode = decodeID($this->id_user);	
		$user = $this->ion_auth->user($id_decode)->row();
		$data = array(
			'title' => "Dashboard",
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
			'users_groups' => $this->users_groups,
			'users_permissions' => $this->ion_auth_acl->build_acl()
		);

		$data['user_data'] = $user;
		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
	}
	public function data(){
		if(!$this->ion_auth_acl->has_permission('menu_manage'))
            redirect('/dashboard');

		$data = array(
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
	
		if($this->url3 == "users"){ 
			$data['title'] = "Manage | User's"; 
		} else if($this->url3 == "groups"){ 
			$data['title'] = "Manage | Group's"; 
		}else if($this->url3 == "permissions"){ 
			$data['title'] = "Manage | Permission's"; 
		}

		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
	}
	public function setting(){
		if(!$this->ion_auth_acl->has_permission('menu_setting'))
            redirect('/dashboard');

		$data = array(
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
	
		if($this->url3 == "seo"){  
			$data['title'] = "Setting | Search Engine Optimisation";
			$seo_num=$this->m_set_seo->seo_row();

			$this->form_validation->set_rules('meta_description', 'Description', 'required|max_length[156]xss_clean');
			$this->form_validation->set_rules('meta_keywords', 'Keywords', 'required|xss_clean');
			$this->form_validation->set_rules('meta_author', 'Author', 'required|xss_clean');
			$this->form_validation->set_rules('meta_google_verification', 'Google Verification','required|trim|xss_clean');
			$this->form_validation->set_rules('meta_google_analytics_verification', 'GoogleAnalytics Verification', 'trim|xss_clean');
			$this->form_validation->set_rules('meta_bing_verification', 'Bing Verification','trim|xss_clean');
			$this->form_validation->set_rules('meta_alexa_verification', 'Alexa Verification','trim|xss_clean');

			if($this->form_validation->run() === TRUE){
				if($seo_num == 0){ $this->m_set_seo->seo_save(); } 
				else { $this->m_set_seo->seo_edit(); }
				$this->session->set_flashdata('success', "Berhasil disimpan!");
				redirect('/setting/seo');
			}else{	
				$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
			}
		} else if($this->url3 == "general"){ 
			$data['title'] = "Setting | General";				
			$general_num=$this->m_set_general->general_row();

			$this->form_validation->set_rules('name_web','Nama','required|xss_clean');
			$this->form_validation->set_rules('slogan_web','Slogan','required|xss_clean');
		
			if($this->form_validation->run() === TRUE){
				if($general_num == 0){ $this->m_set_general->general_save(); } 
				else { $this->m_set_general->general_edit(); }
				$this->session->set_flashdata('success', "Berhasil disimpan!");
				redirect('/setting/general', 'refresh');
			}else{	
				$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
			}
		}
		else if($this->url3 == "socmed"){ 
			$data['title'] = "Setting | Social Media"; 	
			$socmed_num=$this->m_set_socmed->socmed_row();

			$this->form_validation->set_rules('facebook','Facebook','trim|required|xss_clean');
			$this->form_validation->set_rules('twitter','Twitter','trim|required|xss_clean');
			$this->form_validation->set_rules('google_plus','Google plus','trim|required|xss_clean');
			$this->form_validation->set_rules('instagram','Instagram','trim|xss_clean');
			$this->form_validation->set_rules('youtube','Youtube','trim|xss_clean');
			$this->form_validation->set_rules('whatsapp','Whatsapp','trim|is_natural|xss_clean');
		
			if($this->form_validation->run() === TRUE){
				if($socmed_num == 0){ $this->m_set_socmed->socmed_save(); } 
				else { $this->m_set_socmed->socmed_edit(); }
				$this->session->set_flashdata('success', "Berhasil disimpan!");
				redirect('/setting/socmed', 'refresh');
			}else{	
				$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
			}
		}
		else if($this->url3 == "other"){ $data['title'] = "Setting | Others"; }	
		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
	}

	function profile($id = NULL){
		$id_decode = decodeID($id);	
		$user = $this->ion_auth->user($id_decode)->row();
		$users_groups=$this->ion_auth->get_users_groups($id_decode)->result();
		$data = array(
			'title' => "Details Profile | ".ucfirst(word_limiter($user->full_name,2)),
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
			'users_groups' => $users_groups,
			'users_permissions' => $this->ion_auth_acl->build_acl()
		);
		$data['user_data'] = $user;
		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
	}

	// create a user

	function create_user(){
		$data = array(
			'title' => "Manage | Add user",
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);


        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $data['identity_column'] = $identity_column;
		
		$full_name_column = $this->config->item('full_name','ion_auth');
        $data['full_name_column'] = $full_name_column;

        if($full_name_column!=='yes'){
			// validate form input
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		}else{
			$this->form_validation->set_rules('full_name', $this->lang->line('create_user_validation_fullname_label'), 'required|alpha_spaces');
		}
		
		
        if($identity_column !== 'email'){
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        } else {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }

		$this->form_validation->set_rules('identity', 'Username', 'required|alpha_dash|is_unique[users.username]');

        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        //$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
			//$user_name_input = $this->input->post('user_name');
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $this->input->post('identity') : $email;
            $password = $this->input->post('password');

            $additional_data = array(
				//'first_name' => $this->input->post('first_name'),
				//'last_name'  => $this->input->post('last_name'),
				'full_name'  => $this->input->post('full_name'),
				//'username'  => $user_name_input,
				//'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
				//'email'      => $this->input->post('email'),
            );
        }
        
		if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data)) {
            $this->session->set_flashdata('success', $this->ion_auth->messages());
			redirect("user/add", 'refresh');
        } else {
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			
			$data['full_name'] = array(
				'name'  => 'full_name',
				'id'    => 'full_name',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('full_name'),
				'placeholder'    => 'Nama lengkap',
				'required' => 'required',
				'autocomplete' => 'off',
			);
			
			/*
			$data['user_name'] = array(
				'name'  => 'user_name',
				'id'    => 'user_name',
				'type'  => 'text',
				'class' => 'form-control',
                'value' => $this->form_validation->set_value('user_name'),
				'placeholder'    => 'Username',
				'required' => 'required',
			);
			*/
			
            $data['user_name'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
				'class'  => 'form-control',
                'value' => $this->form_validation->set_value('identity'),
				'placeholder'    => 'Username',
				'required' => 'required',
				'autocomplete' => 'off',
            );

			$data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'class'  => 'form-control',
				'required'  => 'required',
				'value' => $this->form_validation->set_value('phone'),
				'placeholder'  => 'Nomor telepon aktif',
				'required' => 'required',
				'minlength'=>"9",
				'maxlength'=>"12",
				'autocomplete' => 'off',
			);
			$data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
				'class'  => 'form-control',
				'required'  => 'required',
				'value' => $this->form_validation->set_value('email'),
				'placeholder'    => 'Email aktif',
				'required' => 'required',
				'autocomplete' => 'off',
			);
			
            $data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
				'class'  => 'form-control',
				'required'  => 'required',
				'placeholder' => 'Password',
                //'value' => $this->form_validation->set_value('password'),
				'minlength' => '5',
				'autocomplete' => 'off',
            );
            $data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
				'class'  => 'form-control',
				'required'  => 'required',
				'placeholder' => 'Password confirm',
                //'value' => $this->form_validation->set_value('password_confirm'),
				'data-match' => "#password", 
				'data-match-error' => "Whoops, these don't match",
				'autocomplete' => 'off',
            );

			$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
        }
    }

	// edit a user
	function update_user($id = NULL){
		$id_decode = decodeID($id);		
		$user = $this->ion_auth->user($id_decode)->row();
		if($id_decode){$full_name = " | ".$user->full_name;}
		$data = array(
			'title' => "Manage | Edit user".$full_name,
			'id_user' => $this->id_user,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
			'id_decode' => $id_decode,
		);


		if ((!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id_decode))){
			redirect('dashboard');
		}

		if($id_decode == NULL){
			redirect('dashboard');
		}

		// Cek jika admin bisa edit semua user, Jika bukan admin hanya bisa edit diri sendiri
		$check_num_user = $this->ion_auth->user($id_decode)->num_rows();
		if($check_num_user != 1 or (!$this->ion_auth->is_admin() and ($this->id_user != $id_decode))){
			redirect('dashboard');
		}

        $identity_column = $this->config->item('identity','ion_auth');
        $data['identity_column'] = $identity_column;

		$full_name_column = $this->config->item('full_name','ion_auth');
        $data['full_name_column'] = $full_name_column;

		//$user = $this->ion_auth->user($id_decode)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id_decode)->result();

		// validate form input
        if($full_name_column!=='yes'){
			// validate form input
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		}else{
			$this->form_validation->set_rules('full_name', 'Full name', 'required|alpha_spaces');
		}
		if($user->username == FALSE and ($this->id_user == $id_decode)){
			$this->form_validation->set_rules('user_name', 'Username', 'required|alpha_dash|is_unique[users.username]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|is_natural');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'required|valid_email|callback_cek_domain_email');


		if (isset($_POST) && !empty($_POST)){
			// update the password if it was posted
			if ($this->input->post('password')){
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() === TRUE)
			{
				if($user->username == FALSE and ($this->id_user == $id_decode)){
					$user_name_input = $this->input->post('user_name');
				} else {
					$user_name_input = $user->username;
				}

				$data = array(
					//'first_name' => $this->input->post('first_name'),
					//'last_name'  => $this->input->post('last_name'),
					'full_name'  => $this->input->post('full_name'),
					'username'  => $user_name_input,
					//'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
					'email'      => $this->input->post('email'),
				);

				// update the password if it was posted
				if ($this->input->post('password')){
					$data['password'] = $this->input->post('password');
				}


				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)){
					//Update the groups user belongs to
					$groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData)) {

						$this->ion_auth->remove_from_group('', $id_decode);

						foreach ($groupData as $grp) {
							$this->ion_auth->add_to_group($grp, $id_decode);
						}

					}
				}

			// check to see if we are updating the user
				if($this->ion_auth->update($user->id, $data)){
			    	// redirect them back to the admin page if admin, or to the base url if non admin
				    $this->session->set_flashdata('success', $this->ion_auth->messages() );
				    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
						redirect('user/edit/'.encodeID($id_decode), 'refresh');
					} else {
						redirect('/', 'refresh');
					}
			    } else {
				    $this->session->set_flashdata('danger', $this->ion_auth->errors() );
				    if ($this->ion_auth->is_admin() or ($this->id_user == $id_decode)) {
						redirect('user/edit/'.encodeID($id_decode), 'refresh');
					} else {
						redirect('/', 'refresh');
					}

			    }

			}
		}

		// display the edit user form
		//$data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$data['user'] = $user;
		$data['groups'] = $groups;
		$data['currentGroups'] = $currentGroups;

		$data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
			'required' => 'required',
		);
		$data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'class'  => 'form-control',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
			'required' => 'required',
		);
        $data['full_name'] = array(
            'name'  => 'full_name',
            'id'    => 'full_name',
            'type'  => 'text',
			'class' => 'form-control',
			'value' => $user->full_name,
			'placeholder'    => 'Nama lengkap',
			'required' => 'required',
        );

		$data['check_user_name'] = $user->username;
		if($user->username == FALSE and ($this->id_user == $id)){
			$data['user_name'] = array(
				'name'  => 'user_name',
				'id'    => 'user_name',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $user->username,
				'required' => 'required',
			);
		}else{
			$data['user_name'] = array(
				'disabled'  => 'disabled',
				'class' => 'form-control',
				'value' => $user->username,
				'required' => 'required',
			);
		}

		$data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class'  => 'form-control',
			'required'  => 'required',
			'value' => $this->form_validation->set_value('phone', $user->phone),
			'placeholder'  => 'Nomor telepon aktif',
			'required' => 'required',
		);
		$data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class'  => 'form-control',
			'required'  => 'required',
			'value' => $this->form_validation->set_value('email', $user->email),
			'placeholder'    => 'Email aktif',
			'required' => 'required',
		);

		if($this->id_user != $id){
			$data['password'] = array(
				'name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'class'  => 'form-control',
			);
			$data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id'   => 'password_confirm',
				'type' => 'password',
				'class'  => 'form-control',
			);
		}

		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
	}

    public function user_permissions($id = NULL){
		$id_decode = decodeID($id);		
		$user = $this->ion_auth->user($id_decode)->row();
		if($id_decode){$full_name = " ".$user->full_name;}
		$data = array(
			'title' => "Manage | Ubah Wewenang".isset($full_name),
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('Manage/users', 'refresh');

        
        $user_id = $id_decode;
        if( ! $user_id ){
            $this->session->set_flashdata('message', "No user ID passed");
            redirect("dashboard", 'refresh');
        }

        if( $this->input->post() && $this->input->post('cancel') )
            redirect("user/permissions/".encodeID($id_decode), 'refresh');
        if( $this->input->post() && $this->input->post('save') ){
            foreach($this->input->post() as $k => $v){
                if( substr($k, 0, 5) == 'perm_' ){
                    $permission_id  =   str_replace("perm_","",$k);
                    if( $v == "X" )
                        $this->ion_auth_acl->remove_permission_from_user($user_id, $permission_id);
                    else
                        $this->ion_auth_acl->add_permission_to_user($user_id, $permission_id, $v);
                }
            }
            redirect("user/permissions/".encodeID($id_decode), 'refresh');
        }
        $user_groups    =   $this->ion_auth_acl->get_user_groups($user_id);
        $data['user_id']                =   $user_id;
        $data['permissions']            =   $this->ion_auth_acl->permissions('full', 'perm_key');
        $data['group_permissions']      =   $this->ion_auth_acl->get_group_permissions($user_groups);
        $data['users_permissions']      =   $this->ion_auth_acl->build_acl($user_id);

		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
    }

	/* Permissions */
	public function add_permission(){
		$data = array(
			'title' => "Manage | Tambah Wewenang",
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('/manage/permissions', 'refresh');

        $this->form_validation->set_rules('perm_key', 'key', 'required|alpha_dash|is_unique[permissions.perm_key]|trim');
        $this->form_validation->set_rules('perm_name', 'name', 'required|trim');
        $this->form_validation->set_message('required', 'Please enter a %s');

		if($this->form_validation->run() === TRUE){
            $new_permission_id = $this->ion_auth_acl->create_permission($this->input->post('perm_key'), $this->input->post('perm_name'));
            if($new_permission_id){
                $this->session->set_flashdata('success', "Berhasil ditambah!");
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect("/manage/permissions", 'refresh');
            }
		}else{	
			$data['message'] = (validation_errors() ? validation_errors() : $this->session->set_flashdata('message'));
		}
		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
    }

	public function update_permission($id = NULL){
		$id_decode = decodeID($id);		
		$data = array(
			'title' => "Manage | Permission edit",
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
        if( $this->input->post() && $this->input->post('cancel') )
            redirect('manage/permissions', 'refresh');

        $permission_id = $id_decode;

		/*
        if( ! $permission_id ) {
            $this->session->set_flashdata('message', "No permission ID passed");
            redirect("manage/permissions");
        }
		*/

        $permission =   $this->ion_auth_acl->permission($permission_id);

        $this->form_validation->set_rules('perm_key', 'key', 'required|trim');
        $this->form_validation->set_rules('perm_name', 'name', 'required|trim');
        $this->form_validation->set_message('required', 'Please enter a %s');

        if( $this->form_validation->run() === FALSE )
        {
            $data['message']    = ($this->ion_auth_acl->errors() ? $this->ion_auth_acl->errors() : $this->session->flashdata('message'));
            $data['permission'] = $permission;

			$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
		} else {
            $additional_data    =   array(
                'perm_name' =>  $this->input->post('perm_name')
            );

            $update_permission = $this->ion_auth_acl->update_permission($permission_id, $this->input->post('perm_key'), $additional_data);
            if($update_permission){
                // check to see if we are creating the permission
                // redirect them back to the admin page
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', "Berhasil diubah!");
				redirect("/manage/permissions");
				//redirect("/permission/edit/".encodeID($permission_id));
            }
        }
    }

	public function add_group(){
		$data = array(
			'title' => "Manage | Group add" , //$this->lang->line('create_group_title')
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			redirect("/dashboard", 'refresh');
		}
		
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'required|alpha_dash');
        if( $this->form_validation->run() === FALSE ){
			$data['group_name'] = array(
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'class'  => 'form-control',
				'required' => 'required',
				'value' => $this->form_validation->set_value('group_name'),
				'placeholder' => 'Group name',
			);
			$data['group_description'] = array(
				'name'  => 'group_description',
				'id'    => 'group_description',
				'type'  => 'text',
				'class'  => 'form-control',
				'required' => 'required',
				'value' => $this->form_validation->set_value('group_description'),
				'placeholder' => 'Group description',
				'maxlength' =>'50',
				'minlength' =>'5',
			);
            $data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
        } else {
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('group_description'));
			if($new_group_id){
				$this->session->set_flashdata('success', $this->ion_auth->messages());
			}else{
				$this->session->set_flashdata('danger', $this->ion_auth->errors() );
			}
			redirect("/group/add");
        }
	}
	
	// edit a group
	public function update_group($id = NULL){
		$id_decode = decodeID($id);	
		$data = array(
			'title' => "Manage | Group edit" , //$this->lang->line('edit_group_title')
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);

		if(!$id_decode || empty($id_decode)){ redirect('manage/groups', 'refresh'); }
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){ redirect("/dashboard", 'refresh');}
		
		$group = $this->ion_auth->group($id_decode)->row();
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'required|alpha_dash');
        if( $this->form_validation->run() === FALSE ){
			$data['group'] = $group;
			$readonly = $this->config->item('admin_group', 'ion_auth') === $group->name ? 'readonly' : '';
			$data['group_name'] = array(
				'name'    => 'group_name',
				'id'      => 'group_name',
				'type'    => 'text',
				'class'  => 'form-control',
				'required' => 'required',
				'value'   => $this->form_validation->set_value('group_name', $group->name),
				$readonly => $readonly,
			);
			$data['group_description'] = array(
				'name'  => 'group_description',
				'id'    => 'group_description',
				'type'  => 'text',
				'class'  => 'form-control',
				'required' => 'required',
				'value' => $this->form_validation->set_value('group_description', $group->description),
			);

			$data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
			$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
        } else {
			$group_update = $this->ion_auth->update_group($id_decode, $_POST['group_name'], $_POST['group_description']);
			if($group_update){
				$this->session->set_flashdata('success', $this->lang->line('edit_group_saved'));
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
			}
			redirect("/group/edit/".encodeID($id_decode));
        }
		//if (isset($_POST) && !empty($_POST)) { }
	}

	public function group_permissions($id = NULL){
		echo 'Dia'.$id_decode = decodeID($id);	
		$data = array(
			'title' => "Manage | Group permissions" , //$this->lang->line('create_group_title')
			'id_user' => $this->id_user,
			'username' => $this->username,
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			redirect("/dashboard", 'refresh');
		}

        $group_id = $id_decode;
        if( ! $group_id ){
            $this->session->set_flashdata('message', "No group ID passed");
            redirect("manage/groups", 'refresh');
        }
		
        if( $this->input->post() && $this->input->post('save') ){
            foreach($this->input->post() as $k => $v){
                if( substr($k, 0, 5) == 'perm_' ){
                    $permission_id  =   str_replace("perm_","",$k);
                    if( $v == "X" )
                        $this->ion_auth_acl->remove_permission_from_group($group_id, $permission_id);
                    else
                        $this->ion_auth_acl->add_permission_to_group($group_id, $permission_id, $v);
                }
            }
            redirect("group/permissions/".$id, 'refresh');
        }
		//menu_manage_permission_add
        $data['permissions']            =   $this->ion_auth_acl->permissions('full', 'perm_key');
        $data['group_permissions']      =   $this->ion_auth_acl->get_group_permissions($group_id);
		$data['group']           		=   $user = $this->ion_auth->group($id_decode)->row();
		$this->_render_page('su_general/content/contents', 'su_admin/component/pages/pages-content/content', $data);
    }


	public function cek_domain_email($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			list($user, $host) = explode('@', $email);
    			if (!checkdnsrr($host, 'MX')) {
					$this->form_validation->set_message('cek_domain_email', 'Domain %s tidak ditemukan.');
    				return false;
			} else {
				return true;
			}
		} else {
				$this->form_validation->set_message('cek_domain_email', 'Domain %s tidak ditemukan1.');
				return false;
		}
	} 

	function _render_page($view, $data=null, $returnhtml=false){ //I think this makes more sense
		$this->viewdata = (empty($data)) ? $data: $data;
		$view_html = $this->template->load($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}
