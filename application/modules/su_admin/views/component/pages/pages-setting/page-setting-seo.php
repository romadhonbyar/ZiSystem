<?php
	// Attribute Meta Setting
	$meta_set=$this->m_set_seo->seo_view();
	$meta_description = $meta_set['meta_description'];
	$meta_keywords = $meta_set['meta_keywords'];
	$meta_author = $meta_set['meta_author'];
	$meta_google_verification = $meta_set['meta_google_verification'];
	$meta_google_analytics_verification = $meta_set['meta_google_analytics_verification'];
	$meta_bing_verification = $meta_set['meta_bing_verification'];
	$meta_alexa_verification = $meta_set['meta_alexa_verification'];

	$meta_keywords = array(
		'name'    => 'meta_keywords',
		'id'      => 'meta_keywords',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $meta_keywords,
		'placeholder' => "Ex: koperasi, kantin koperasi, hari koperasi",
		'autocomplete' => 'off',
	);
	$meta_author = array(
		'name'    => 'meta_author',
		'id'      => 'meta_author',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $meta_author,
		'placeholder' => "Pemilik website",
		'autocomplete' => 'off',
	);
	$meta_google_verification = array(
		'name'    => 'meta_google_verification',
		'id'      => 'meta_google_verification',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $meta_google_verification,
		'placeholder' => "Google verification website",
		'autocomplete' => 'off',
	);
	$meta_google_analytics_verification = array(
		'name'    => 'meta_google_analytics_verification',
		'id'      => 'meta_google_analytics_verification',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $meta_google_analytics_verification,
		'placeholder' => "Google analytics website",
		'autocomplete' => 'off',
	);
	$meta_bing_verification = array(
		'name'    => 'meta_bing_verification',
		'id'      => 'meta_bing_verification',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $meta_bing_verification,
		'placeholder' => "Bing verification website",
		'autocomplete' => 'off',
	);
	$meta_alexa_verification = array(
		'name'    => 'meta_alexa_verification',
		'id'      => 'meta_alexa_verification',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'   => $this->form_validation->set_value('meta_alexa_verification'),
		'placeholder' => "Alexa verification website",
		'autocomplete' => 'off',
	);
?>

<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">SEO</h3> - <small>Pengoptimalisasi website di mesin pencari</small>
			</div><!-- /.box-header -->
			
			<!-- form start -->
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<div class="form-group has-feedback">
						<label>Description</label>
						<textarea name="meta_description" cols="10" rows="4" id="meta_description" class="form-control counted" maxlength="156" style="resize: none;" placeholder="Deskripsi website"><?php echo $meta_description; ?></textarea>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<span class="help-block"><span id="counter">156 characters remaining</span></span>
					</div>
					<div class="form-group has-feedback">
						<label>Keywords</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
							<?php echo form_input($meta_keywords);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors">Pisah dengan koma. Misal: keyword1, keyword2, keyword3</div>
					</div>
					<div class="form-group has-feedback">
						<label>Author</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
							<?php echo form_input($meta_author);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Google Verification</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-google fa-fw"></i></span>
							<?php echo form_input($meta_google_verification);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Google Analytics Verification</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-google fa-fw"></i></span>
							<?php echo form_input($meta_google_analytics_verification);?>
						</div>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Bing Verification</label>
						<?php echo form_input($meta_bing_verification);?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label>Alexa Verification</label>
						<?php echo form_input($meta_alexa_verification);?>
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


