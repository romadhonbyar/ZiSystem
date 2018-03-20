<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang('create_group_heading');?></h3> - <small><?php echo lang('create_group_subheading');?></small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<div class="form-group has-feedback">
						<?php echo lang('create_group_name_label', 'group_name');?>
						<?php echo form_input($group_name);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('create_group_desc_label', 'description');?>
						<?php echo form_input($group_description);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Maximum length of 50 characters</div>
					</div>
				</div><!-- /.box-body -->

				<div class="box-footer">
					<?php $this->load->view('su_general/component/elemen/elemen-button'); ?>
				</div>
			<?php echo form_close();?>
			
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div><!--/.row -->