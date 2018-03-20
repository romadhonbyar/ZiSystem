<?php if($knowledge_data){	
	$title_knowledge = array(
		'name'    => 'title_knowledge',
		'id'      => 'title_knowledge',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'	  => $knowledge_data['title_knowledge'],
		'placeholder' => "Title knowledge",
		'autocomplete' => 'off',
	);
	$content_knowledge = array(
		'name'    => 'content_knowledge',
		'id'      => 'content_knowledge',
		'value'	  => $knowledge_data['content_knowledge'],
		'class'	  => 'ckeditor form-control',
		'placeholder' => "Start writing here...",
		'autocomplete' => 'off',
	);
	$link_knowledge = array(
		'name'    => 'link_knowledge',
		'id'      => 'link_knowledge',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'	  => $knowledge_data['link_knowledge'],
		'placeholder' => "Link knowledge",
		'autocomplete' => 'off',
	);
	$name_knowledge = array(
		'name'    => 'name_knowledge',
		'id'      => 'name_knowledge',
		'type'    => 'text',
		'class'	  => 'form-control',
		'value'	  => $knowledge_data['name_knowledge'],
		'placeholder' => "File name knowledge",
		'autocomplete' => 'off',
	);
?>
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Update knowledge</h3> - 
					<small>
						<span id="autosave-status">
							<span class="label label-info"><i class="fa fa-save fa-fw"></i> autosave / 30 seconds</span>
						</span>
					</small>
				</div><!-- /.box-header -->
				
				<!-- form start -->
				<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
					<div class="box-body">
						<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
						<?php echo form_input(array('name' => 'code_knowledge', 'type'=>'hidden', 'id' =>'code_knowledge'), $knowledge_data['code_knowledge']); ?>

						<?php echo form_input(array('name' => 'id_knowledge', 'type'=>'hidden', 'id' =>'id_knowledge'), $knowledge_data['id_knowledge']); ?>

						<?php echo form_input(array('name' => 'base_url', 'type'=>'hidden', 'id' =>'base_url'), base_url()); ?>

						<div class="form-group">
							<label>Title</label>
							<?php echo form_input($title_knowledge);?>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label>Category</label>
							<div class="input-group">
								<div class="input-group-btn">
									<a href="<?php echo site_url('category/add');?>" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Category</a>
								</div>
								<select class="form-control" required name="id_category" id="id_category">
									<option value="" >-Category-</option>
									<?php if($category_data) { foreach($category_data as $row) {?>
										<option <?php if($knowledge_data['id_category'] == $row['id_category']){echo "selected";} ?> value="<?php echo $row['id_category'];?>" ><?php echo $row['name_category'];?></option>
									<?php } } ?>
								</select>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label>Content</label>
							<?php echo form_textarea($content_knowledge);?>
							<div class="help-block with-errors"></div>
						</div>					
						<div class="form-group">
							<label>Tags</label>
							<textarea id="tags_knowledge" name="tags_knowledge" ><?php echo $knowledge_data['tags_knowledge'];?></textarea>
							<div class="help-block with-errors">Masukkan kata-kata kunci yang digunakan di dalam artikel. Berilah tanda koma (,) untuk memisahkan kata kunci satu dengan yang lainnya.</div>
						</div>
						<div class="form-group">
							<label>Type</label>
							<select id="type_knowledge" name="type_knowledge" class="form-control">	
								<option value="">-- Pilih Type --</option>
								<option <? if($knowledge_data['type_knowledge']==1){echo "selected";}?> value="1">Gambar</option>
								<option <? if($knowledge_data['type_knowledge']==2){echo "selected";}?> value="2">File (pdf,word,rar)</option>
								<option <? if($knowledge_data['type_knowledge']==3){echo "selected";}?> value="3">Video</option>
								<option <? if($knowledge_data['type_knowledge']==4){echo "selected";}?> value="4">Suara</option>
							</select>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label>File name</label>
							<?php echo form_input($name_knowledge);?>
							<div class="help-block with-errors"></div>
						</div>	
						<div class="form-group">
							<label>Link</label>
							<?php echo form_input($link_knowledge);?>
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

	<script src="<?php echo base_url('assets/backend/plugins/ckeditor/ckeditor.js');?>"></script>
<?php } ?>