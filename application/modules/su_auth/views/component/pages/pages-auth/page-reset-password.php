<body class="hold-transition login-page">
    <div class="login-box">
		<div class="login-logo">
			<a href="<?php echo base_url();?>"><b><?php echo lang('reset_password_heading');?></b>SU</a>
		</div><!-- /.login-logo -->
		<div class="login-box-body">
			<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
			
			<?php echo form_open('su/reset_password/' . $code);?>
				<div class="form-group has-feedback">
					<?php echo form_input($new_password);?>
					<span class="fa fa-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<?php echo form_input($new_password_confirm);?>
					<span class="fa fa-lock form-control-feedback"></span>
				</div>
				<?php echo form_input($user_id);?>
				<div class="row">
					<div class="col-xs-8">
						<a href="ana" class="btn btn-warning btn-flat">Sudah ingat!</a>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('reset_password_submit_btn');?></button>
					</div><!-- /.col -->
				</div>
			<?php echo form_close();?>
			<!--versi <?php echo CI_VERSION; ?>-->
		</div><!-- /.login-box-body -->
    </div><!-- /.login-box -->