<table id="table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	<?php
		if($url2 == "data"){
			if($url3 == "draft"){ $this->load->view('su_knowledge/component/pages/pages-table/page-table-knowledge-draft');}
			else if($url3 == "publish"){ $this->load->view('su_knowledge/component/pages/pages-table/page-table-knowledge-publish');}
			else if($url3 == "category"){ $this->load->view('su_knowledge/component/pages/pages-table/page-table-knowledge-category');}
		}
	?>
</table>