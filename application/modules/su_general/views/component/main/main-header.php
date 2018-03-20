<header class="main-header">
	<?php $this->load->view('su_general/component/main/main-header/nav/main-header-logo'); ?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php $this->load->view('su_general/component/main/main-header/nav/main-header-profile'); ?>
				<?php //$this->load->view('su_general/component/main/main-header/nav/main-header-messages'); ?>
				<?php //$this->load->view('su_general/component/main/main-header/nav/main-header-notifications'); ?>
				<?php //$this->load->view('su_general/component/main/main-header/nav/main-header-taks'); ?>
				<?php //$this->load->view('su_general/component/main/main-header/nav/main-header-user'); ?>
				<?php //$this->load->view('su_general/component/main/main-header/nav/main-header-control'); ?>
			</ul>
		</div>
    </nav>
</header>