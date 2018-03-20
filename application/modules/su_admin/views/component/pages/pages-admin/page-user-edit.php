<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang('edit_user_heading');?></h3> - <small><?php echo lang('edit_user_subheading');?></small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
				
					<?php if($full_name_column!=='yes') { ?>
					<div class="form-group has-feedback">
						<?php echo lang('edit_user_fname_label', 'first_name');?>
						<?php echo form_input($first_name);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('edit_user_lname_label', 'last_name');?>
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
						<?php echo lang('edit_user_phone_label', 'phone');?>
						<?php echo form_input($phone);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Example: 08978596665</div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('edit_user_email_label', 'email');?>
						<?php echo form_input($email);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<?php if ($this->ion_auth_acl->has_permission('menu_manage') or ($id_user != $id_decode)){ ?>
					<div class="form-group has-feedback">
						<?php echo lang('edit_user_password_label', 'password');?>
						<?php echo form_input($password);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Minimum length of 5 characters</div>
					</div>
					<div class="form-group has-feedback">
						<?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
						<?php echo form_input($password_confirm);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<?php } ?>
					
					<div class="form-group has-feedback">
						<?php if ($this->ion_auth_acl->has_permission('menu_manage')): ?>
						<?php //if ($this->ion_auth->is_admin()): ?>
							<h4><?php echo lang('edit_user_groups_heading');?></h4>
							<?php foreach ($groups as $group):?>
								<div class="radio">
									<label class="radio">
									<?php
										$gID=$group['id'];
										$checked = null;
										$item = null;
										foreach($currentGroups as $grp) {
											if ($gID == $grp->id) {
												$checked= ' checked="checked"';
											break;
											}
										}
									?>
									<input type="radio" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
									<?php echo ucfirst(htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8'));?>
									</label>
									<div class="help-block with-errors"></div>
								</div>
							<?php endforeach?>
						<?php endif ?>
					</div>
					<?php echo form_hidden('id', $user->id);?>
				</div><!-- /.box-body -->
			
				<div class="box-footer">
					<?php $this->load->view('su_general/component/elemen/elemen-button'); ?>
				</div>
			<?php echo form_close();?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div><!--/.row -->