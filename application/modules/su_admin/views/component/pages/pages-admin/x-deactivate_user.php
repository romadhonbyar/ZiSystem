<div class="row">
	<!-- left column -->
	<div class="col-md-7">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo lang('deactivate_heading');?></h3> - <small><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></small>
			</div><!-- /.box-header -->
			<!-- form start -->
			<?php echo form_open("su/deactivate/".$user->id);?>
				<div class="box-body">
					<?php $this->load->view('su_auth/component/elemen/elemen-message'); ?>
				
					<div class="form-group">
						<div class="radio">
							<label><input type="radio" name="confirm" value="yes" checked="checked" /><?php echo lang('deactivate_confirm_y_label', 'confirm');?></label>
						</div>
						<div class="radio">
							<label><input type="radio" name="confirm" value="no" /><?php echo lang('deactivate_confirm_n_label', 'confirm');?></label>
						</div>
					</div>
					<div class="form-group">
						<label>Memo</label>
						<textarea required="required" class="form-control" name="memo" rows="2" cols="5" placeholder="Tulis alasan diblok / diputihkan! :-)" ><?php echo set_value('memo');?></textarea>
					</div>
					<?php echo form_hidden(array('id'=>$user->id)); ?>
				</div><!-- /.box-body -->
			
				<div class="box-footer">
				<button type="submit" class="btn btn-primary btn-flat btn-block"><?php echo lang('deactivate_submit_btn');?></button>
				</div>
			<?php echo form_close();?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div><!--/.row -->