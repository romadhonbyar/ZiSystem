<body class="hold-transition login-page" style='display: none'>
	<div class='fade out'>
		<div class="login-box">
			<div class="login-logo">
				<a href="../../index2.html"><b><?php echo lang('login_heading');?></b>SU</a>
			</div><!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg"><?php echo lang('login_subheading');?></p>
				<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
				
				<?php echo form_open($this->uri->uri_string());?>
					<div class="form-group has-feedback">
						<?php echo form_input($identity);?>
						<span class="fa fa-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<?php echo form_input($password);?>
						<span class="fa fa-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-8">
							<a href="<?php echo site_url('forgot');?>" class="btn btn-warning btn-flat"><?php echo lang('login_forgot_password');?></a>
							<!--
							<div class="checkbox icheck">
							<label>
								<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?><?php echo lang('login_remember_label', 'remember');?>
							</label>
							</div>
							-->
						</div><!-- /.col -->
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('login_submit_btn');?></button>
						</div><!-- /.col -->
					</div>
				<?php echo form_close();?>
			</div><!-- /.login-box-body -->
		</div><!-- /.login-box -->
    </div><!-- /.fade out -->