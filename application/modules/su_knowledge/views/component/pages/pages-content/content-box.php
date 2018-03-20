<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<?php $this->load->view('su_knowledge/component/pages/pages-content/content-box-header'); ?>
			<div class="box-body">
				<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
				<?php
					if($url2 == "data"){
						if($url3 == "update_knowledge" or
						   	$url3 == "draft" or
							$url3 == "publish" or
							$url3 == "category"
						   ){
							$this->load->view('su_knowledge/component/pages/pages-table/pages-table-all');
						}
					}
				?>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->