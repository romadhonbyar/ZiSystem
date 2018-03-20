<body class="hold-transition skin-black sidebar-mini" style='display: none'>
	<div class='fade out'>
		<div class="wrapper">
			<?php $this->load->view('su_general/component/main/main-header'); ?>
			<?php $this->load->view('su_general/component/main/main-sidebar'); ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?php $this->load->view('su_knowledge/component/pages/pages-content/content-header'); ?>
				<!-- Main content -->
				<section class="content">
						<?php
							/* su_knowledge */
							if($url2 == "data"){
								if($url3 == "draft" or
								   $url3 == "publish" or
								   $url3 == "category"
								   ){
								   $this->load->view('su_knowledge/component/pages/pages-content/content-box');
								}
							}				
							else if($url2 == "update_knowledge"){
								$this->load->view('su_knowledge/component/pages/pages-knowledge/page-knowledge-edit');
							}else if($url2 == "add_category"){
								$this->load->view('su_knowledge/component/pages/pages-knowledge/page-knowledge-category-add');
							}else if($url2 == "update_category"){
								$this->load->view('su_knowledge/component/pages/pages-knowledge/page-knowledge-category-edit');
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
