<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<?php $this->load->view('su_admin/component/pages/pages-content/content-box-header'); ?>
			<div class="box-body">
				<!--
				<div  id="success" class="alert alert-success" style="display: none">
					<a class="close" data-dismiss="alert">&times;</a> <strong>Success! </strong>
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				-->
				<?php
					if($url2 == "data"){
						if($url3 == "users" or 
						   $url3 == "permissions" or 
						   $url3 == "groups" or 
						   $url3 == "log_activity"
						   ){
							$this->load->view('su_admin/component/pages/pages-table/pages-table-all');
						}
					}
				?>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->