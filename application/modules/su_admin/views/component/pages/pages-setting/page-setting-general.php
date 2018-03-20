<?php	
	// Attribute Meta Setting
	$general=$this->m_set_general->general_view();
	$maintenance = $general['maintenance'];
	$name_web = $general['name_web'];
	$slogan_web = $general['slogan_web'];
	
	$name_web = array(
		'name'    => 'name_web',
		'id'      => 'name_web',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $name_web,
		'placeholder' => "Nama website",
		'autocomplete' => 'off',
		'required' => 'required',
	);
	$slogan_web = array(
		'name'    => 'slogan_web',
		'id'      => 'slogan_web',
		'type'    => 'text',
		'rows'    => '2',
		'cols'    => '10',
		'class'	  => 'form-control',
		'value'   => $slogan_web,
		'placeholder' => "Slogan website",
		'autocomplete' => 'off',
		'required' => 'required',
	);
?>

<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">General -<small>Tuliskan informasi kegiatan</small></h3>
				</div><!-- /.box-header -->


				<!-- form start -->
				<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
					<div class="box-body">
						<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
  						<div class="form-group has-feedback">
							<label>Nama Website</label>
							<?php echo form_input($name_web);?>
          					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
          					<div class="help-block with-errors"></div>
						</div>
  						<div class="form-group has-feedback">
							 <label for="slogan_web" class="control-label">Slogan Website</label>
							<?php echo form_textarea($slogan_web);?>
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
		<!-- general form elements -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-info-circle fa-fw"></i> Informasi</h3>
			</div><!-- /.box-header -->
			
			<div class="box-body">
				<p>SEO (Search Engine Optimisation) berfungsi untuk mempermudah mesin pencari 
				(Ex: Google) menemukan website ini.</p>
				<p>Gunakan fitur ini dengan bijak!</p>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!--/.col (right) --> 
</div><!--/.row -->