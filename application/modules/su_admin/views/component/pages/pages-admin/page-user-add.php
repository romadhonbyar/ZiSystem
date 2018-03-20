<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang('create_user_heading');?></h3> - <small><?php echo lang('create_user_subheading');?></small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
				
					<?php if($full_name_column!=='yes') { ?>
					<div class="form-group has-feedback">
						<?php echo lang('create_user_fname_label', 'first_name');?>
						<?php echo form_input($first_name);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('create_user_lname_label', 'last_name');?>
						<?php echo form_input($last_name);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<?php } else {?>
					<div class="form-group has-feedback">
						<label class="control-label" >Full Name</label>
						<?php echo form_input($full_name); ?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<?php } ?>
					
					<?php //if($identity_column!=='email') { ?>
					<div class="form-group has-feedback">
						<label class="control-label" >Username</label>
						<?php echo form_input($user_name); ?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<?php //} ?>
					
					<div class="form-group has-feedback">
						<?php echo lang('create_user_phone_label', 'phone');?>
						<?php echo form_input($phone);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Example: 08978596665</div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('create_user_email_label', 'email');?>
						<?php echo form_input($email);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					
					<div class="form-group has-feedback">
						<?php echo lang('create_user_password_label', 'password');?>
						<?php echo form_input($password);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Minimum length of 5 characters</div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
						<?php echo form_input($password_confirm);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
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