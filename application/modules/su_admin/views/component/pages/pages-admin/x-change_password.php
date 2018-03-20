<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang('change_password_heading');?></h3> - <small><?php echo lang('edit_user_subheading');?></small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'my_form1','class' => 'my_form1','autocomplete' => 'off'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<div class="form-group">
						<?php echo lang('change_password_old_password_label', 'old_password');?>
						<?php echo form_input($old_password);?>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?>
						<?php echo form_input($new_password);?>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
						<?php echo form_input($new_password_confirm);?>
						<?php echo form_input($user_id);?>
						<div class="help-block with-errors"></div>
					</div>
				</div><!-- /.box-body -->
			
				<div class="box-footer">
					<?php $this->load->view('su_general/component/elemen/elemen-button'); ?>
				</div>
			<?php echo form_close();?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div><!--/.row -->