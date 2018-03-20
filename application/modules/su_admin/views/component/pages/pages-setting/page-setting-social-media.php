<?php	
	// Attribute Meta Setting
	$socmed=$this->m_set_socmed->socmed_view();	
	$facebook = array(
		'name'    => 'facebook',
		'id'      => 'facebook',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['facebook'],
		'placeholder' => "Username or ID facebook",
		'autocomplete' => 'off',
	);
	$twitter = array(
		'name'    => 'twitter',
		'id'      => 'twitter',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['twitter'],
		'placeholder' => "Username or ID twitter",
		'autocomplete' => 'off',
	);
	$google_plus = array(
		'name'    => 'google_plus',
		'id'      => 'google_plus',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['google_plus'],
		'placeholder' => "Username or ID google plus",
		'autocomplete' => 'off',
	);
	$instagram = array(
		'name'    => 'instagram',
		'id'      => 'instagram',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['instagram'],
		'placeholder' => "Username or ID instagram",
		'autocomplete' => 'off',
	);
	$youtube = array(
		'name'    => 'youtube',
		'id'      => 'youtube',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['youtube'],
		'placeholder' => "Username or ID youtube",
		'autocomplete' => 'off',
	);
	$whatsapp = array(
		'name'    => 'whatsapp',
		'id'      => 'whatsapp',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $socmed['whatsapp'],
		'placeholder' => "Number whatsapp",
		'autocomplete' => 'off',
	);
?>

<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- socmed form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Setting Social Media</h3> - <small>Social media address Pekan Koperasi</small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<div class="form-group has-feedback">
						<label>Facebook</label>
						<div class="input-group">
							<span class="input-group-addon facebook"><i class="fa fa-facebook fa-fw"></i></span>
							<?php echo form_input($facebook);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Twitter</label>
						<div class="input-group">
							<span class="input-group-addon twitter"><i class="fa fa-twitter fa-fw"></i></span>
							<?php echo form_input($twitter);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Google+</label>
						<div class="input-group">
							<span class="input-group-addon google-plus"><i class="fa fa-google-plus fa-fw"></i></span>
							<?php echo form_input($google_plus);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Instagram</label>
						<div class="input-group">
							<span class="input-group-addon instagram"><i class="fa fa-instagram fa-fw"></i></span>
							<?php echo form_input($instagram);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Youtube</label>
						<div class="input-group">
							<span class="input-group-addon youtube"><i class="fa fa-youtube fa-fw"></i></span>
							<?php echo form_input($youtube);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Whatsapp</label>
						<div class="input-group">
							<span class="input-group-addon whatsapp"><i class="fa fa-whatsapp fa-fw"></i></span>
							<?php echo form_input($whatsapp);?>
						</div>
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
	
	<!-- right column -->
	<div class="col-md-6">
		<!-- socmed form elements -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-info-circle fa-fw"></i> Informasi</h3>
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<p>Fitur ini berfungsi untuk menampilkan alamat akun media sosial Pekan Kopersi.</p>
				<p>Kesalahan dalam memasukkan alamat dapat berakibat memberikan informasi yang tidak akurat.</p>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!--/.col (right) -->
</div><!--/.row -->

<style>
.input-group-addon.facebook {
    color: #FFFFFF;
    background-color: #3B5998;
    border-color: #3C5998;
}
.input-group-addon.twitter {
    color: #FFFFFF;
    background-color: #1DA1F2;
    border-color: #1EA1F2;
}
.input-group-addon.google-plus {
    color: #FFFFFF;
    background-color: #DC4E41;
    border-color: #DD4E41;
}
.input-group-addon.youtube {
    color: #FFFFFF;
    background-color: #CD201F;
    border-color: #CC201F;
}
.input-group-addon.instagram {
    color: #FFFFFF;
    background-color: #125688;
    border-color: #135688;
}
.input-group-addon.whatsapp {
    color: #FFFFFF;
    background-color: #4DC247;
    border-color: #4EC247;
}
</style>