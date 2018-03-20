<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Auth.php
 *
 * @package     CI-ACL
 * @author      Steve Goodwin
 * @copyright   2015 Plumps Creative Limited
 */
class Su_auth extends CI_Controller{

    function __construct(){
        parent::__construct();
		
		$this->url1 = $this->uri->rsegment(1);
		$this->url2 = $this->uri->rsegment(2);
		$this->url3 = $this->uri->rsegment(3);
		$this->url4 = $this->uri->rsegment(4);
		$this->url5 = $this->uri->rsegment(5);
    }

    public function index() { redirect('/login'); }
	
	public function login(){
        if( $this->ion_auth->logged_in() ) redirect('dashboard');
		
		$data['title'] = "Login";
		$data['url2'] = $this->uri->rsegment(2);
		$data['url3'] = $this->uri->rsegment(3);
		
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true){
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)){
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				log_act("login", "masuk ke dalam sistem");
				redirect('dashboard', 'refresh');
			} else {
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		} else {
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'class'  => 'form-control',
				'value' => $this->form_validation->set_value('identity'),
				'placeholder'  => "Email",
			);
			$data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'class'  => 'form-control',
				'placeholder'  => "Password",
			);	
			$this->_render_page('su_general/content/contents', 'su_auth/component/pages/pages-auth/page-login',$data);
		}
	}

	
    public function logout(){
		$data['title'] = "Logout";
		log_act("logout", "keluar dari sistem");
        if( $this->ion_auth->logout() ){
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('login', 'refresh');
        }else{
			log_act("logout", "gagal keluar dari sistem");
            die("There was an error logging you out");
		}
	}
	
	
	// forgot password
	function forgot_password(){
		$data = array(
			'title' => "Forgot Password",
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
		// setting validation rules by checking wheather identity is username or email
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() == false)
		{
			$data['type'] = $this->config->item('identity','ion_auth');
			// setup the input
			$data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control',
				'placeholder' => 'Your email',
			);

			if ( $this->config->item('identity', 'ion_auth') != 'email' ){
				$data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$this->_render_page('su_general/content/contents', 'su_auth/component/pages/pages-auth/page-forgot-password', $data);
		}
		else
		{
			$identity_column = $this->config->item('identity','ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if(empty($identity)) {

	            		if($this->config->item('identity', 'ion_auth') != 'email')
		            	{
		            		$this->ion_auth->set_error('forgot_password_identity_not_found');
		            	}
		            	else
		            	{
		            	   $this->ion_auth->set_error('forgot_password_email_not_found');
		            	}

		                $this->session->set_flashdata('message', $this->ion_auth->errors());
                		redirect("forgot_password", 'refresh');
            		}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("ana", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("forgot_password", 'refresh');
			}
		}
	}
	
	// reset password - final step for forgotten password
	public function reset_password($code = NULL){
		$data = array(
			'title' => "Reset Password",
			'url2' => $this->url2,
			'url3' => $this->url3,
			'message' => '',
		);
		
		if (!$code){
			show_404('Ada yang kurang! coba ingat - ingat lagi ...');
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user){
			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');
			if ($this->form_validation->run() == false){
				$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'class'  => 'form-control',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['new_password_confirm'] = array(
					'name'    => 'new_confirm',
					'id'      => 'new_confirm',
					'type'    => 'password',
					'class'  => 'form-control',
					'pattern' => '^.{'.$data['min_password_length'].'}.*$',
				);
				$data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
				);
				
				$this->_render_page('su_general/content/contents', 'su_auth/component/pages/pages-auth/reset_password', $data);
			} else {
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

				if ($change) {
					// if the password was successfully changed
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					redirect("login", 'refresh');
				} else {
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					redirect('reset_password/' . $code, 'refresh');
				}
			}
		} else {
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("forgot_password", 'refresh');
		}
	}

	function _render_page($view, $data=null, $returnhtml=false){ //I think this makes more sense
		$this->viewdata = (empty($data)) ? $data: $data;
		$view_html = $this->template->load($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}
}