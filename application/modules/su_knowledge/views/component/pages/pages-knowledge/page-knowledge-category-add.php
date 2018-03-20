<?php 
	$name_category = array(
		'name'    => 'name_category',
		'id'      => 'name_category',
		'type'    => 'text',
		'class'	  => 'form-control',
		'placeholder' => "Name category",
		'autocomplete' => 'off',
	);
?>
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Add Category</h3> - <small><?php echo lang('create_group_subheading');?></small>
				</div><!-- /.box-header -->
				
				<!-- form start -->
				<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
					<div class="box-body">
						<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
						<?php echo form_input(array('name' => 'slug_category', 'type'=>'hidden', 'id' =>'slug_category')); ?>
						<div class="form-group">
							<label>Name</label>
							<?php echo form_input($name_category);?>
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

	<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/simplemde/simplemde.min.css');?>">
	<script src="<?php echo base_url('assets/backend/plugins/simplemde/simplemde.min.js');?>"></script>
	<script>
	</script>

	<div style="position:fixed;bottom:140px;right:40px;z-index:9999;" id="autosave-status">
		<span class="label label-info"><i class="fa fa-save fa-fw"></i> autosave / 30 seconds</span>
	</div>