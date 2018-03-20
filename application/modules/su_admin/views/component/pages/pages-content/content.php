<body class="hold-transition skin-black sidebar-mini" style='display: none'>
	<div class='fade out'>
		<div class="wrapper">
			<?php $this->load->view('su_general/component/main/main-header'); ?>
			<?php $this->load->view('su_general/component/main/main-sidebar'); ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?php $this->load->view('su_admin/component/pages/pages-content/content-header'); ?>
				<!-- Main content -->
				<section class="content">
						<?php
							/* su_admin */
							if($url2 == "dashboard"){
								$this->load->view('su_admin/component/pages/pages-admin/page-dashboard');
							}else if($url2 == "profile"){
								$this->load->view('su_admin/component/pages/pages-admin/page-user-profile-details');
							}

							/*
							else if($url2 == "view_profile"){
								$this->load->view('su_admin/component/pages/pages-admin/page-user-profile-public');
							}
							*/
							
							else if($url2 == "create_user"){
								$this->load->view('su_admin/component/pages/pages-admin/page-user-add');
							}else if($url2 == "update_user"){
								$this->load->view('su_admin/component/pages/pages-admin/page-user-edit');
							}else if($url2 == "user_permissions"){
								$this->load->view('su_admin/component/pages/pages-admin/page-user-permissions');
							}
							
							else if($url2 == "add_group"){
								$this->load->view('su_admin/component/pages/pages-admin/page-group-add');
							}else if($url2 == "update_group"){
								$this->load->view('su_admin/component/pages/pages-admin/page-group-edit');
							}else if($url2 == "group_permissions"){
								$this->load->view('su_admin/component/pages/pages-admin/page-group-permissions');
							} 
							
							else if($url2 == "add_permission"){
								$this->load->view('su_admin/component/pages/pages-admin/page-permission-add');
							} else if($url2 == "update_permission"){
								$this->load->view('su_admin/component/pages/pages-admin/page-permission-edit');
							}
							
							else if($url2 == "data"){
								if($url3 == "users" or
								   $url3 == "permissions" or
								   $url3 == "groups" or
								   $url3 == "log_activity"
								   ){
								   $this->load->view('su_admin/component/pages/pages-content/content-box');
								}
							}else if($url2 == "setting"){
								if($url3 == "general"){
								   $this->load->view('su_admin/component/pages/pages-setting/page-setting-general');
								} else if($url3 == "seo"){
								   $this->load->view('su_admin/component/pages/pages-setting/page-setting-seo');
								} else if($url3 == "infoweb"){
								   $this->load->view('su_admin/component/pages/pages-setting/page-setting-info-web');
								} else if($url3 == "socmed"){
								   $this->load->view('su_admin/component/pages/pages-setting/page-setting-social-media');
								}
							}
						?>
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<?php $this->load->view('su_general/component/main/main-footer'); ?>
			<?php //$this->load->view('su_general/component/control/control-sidebar'); ?>
			<!-- Add the sidebar's background. This div must be placed
			   immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div><!-- ./wrapper -->
    </div><!-- ./fade out -->
