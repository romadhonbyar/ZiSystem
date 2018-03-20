<?php
	$perm_key = array(
		'name'        => 'perm_key',
		'value'       => set_value('perm_key'),
		'placeholder' => 'Kunci untuk hak akses bagian - bagian sistem',
		'class'       => 'form-control',
		'required'    => 'required',
		'autocomplete' => 'off',
    );
	$perm_name = array(
		'name'        => 'perm_name',
		'value'       => set_value('perm_name'),
		'placeholder' => 'Nama kunci untuk hak akses bagian - bagian sistem',
		'class'       => 'form-control',
		'required'    => 'required',
		'autocomplete' => 'off',
    );
?>
<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Add permission</h3> - <small>Menambah wewenang</small>
			</div><!-- /.box-header -->
			
			<!-- form start -->

			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<div class="form-group has-feedback">
						<?php echo form_label('Key', 'perm_key');?> 
						<?php echo form_input($perm_key); ?>
   						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<?php echo form_label('Name', 'perm_name');?>
						<?php echo form_input($perm_name); ?>
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