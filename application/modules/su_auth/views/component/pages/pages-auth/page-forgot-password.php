<body class="hold-transition login-page">
    <div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url();?>"><b><?php echo lang('forgot_password_heading');?></b></a>
		</div><!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
			<?php $this->load->view('su_admin/component/elemen/elemen-message'); ?>
			
			<?php echo form_open($this->uri->uri_string());?>
				<div class="form-group has-feedback">
					<?php //echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?>
					<?php echo form_input($identity);?>
					<span class="fa fa-envelope form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<a href="<?php echo site_url('login');?>" class="btn btn-warning btn-flat">Sudah ingat!</a>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('forgot_password_submit_btn');?></button>
					</div><!-- /.col -->
				</div>
			<?php echo form_close();?>
			<!--versi <?php echo CI_VERSION; ?>-->
		</div><!-- /.login-box-body -->
    </div><!-- /.login-box -->