<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
<table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	<?php
		if($url2 == "data"){
			if($url3 == "users"){ $this->load->view('su_admin/component/pages/pages-table/page-table-users');}
			elseif($url3 == "permissions"){$this->load->view('su_admin/component/pages/pages-table/page-table-permissions');}
			elseif($url3 == "groups"){$this->load->view('su_admin/component/pages/pages-table/page-table-groups');}
			elseif($url3 == "log_activity"){$this->load->view('su_admin/component/pages/pages-table/page-table-logs');}
		}
	?>
</table>