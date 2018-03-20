<div class="row">
	<!-- left column -->
	<div class="col-md-6">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Manage Group Permissions</h3> - <small>Pemberian hak akses group <?php echo $group->name;?></small>
			</div><!-- /.box-header -->
			
			<!-- form start -->

			<?php //$attribute= array( 'id'=>'my_form','class' => 'my_form'); echo form_open($this->uri->uri_string(), $attribute);?>
			<?php $attribute= array( 'id'=>'reg_form','class' => 'reg_form'); echo form_open($this->uri->uri_string(), $attribute);?>
				<div class="box-body">
					<?php $this->load->view('su_general/component/elemen/elemen-message'); ?>
					<table width="100%">
						<thead>
							<tr>
								<th>Permission</th>
								<th>Allow</th>
								<th>Deny</th>
								<th>Ignore</th>
							</tr>
						</thead>
						<tbody>
						<?php if($permissions) : ?>
							<?php foreach($permissions as $k => $v) : ?>
							<tr>
								<td><?php echo $v['name']; ?></td>
								<td><?php echo form_radio("perm_{$v['id']}", '1', set_radio("perm_{$v['id']}", '1', ( array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] === TRUE ) ? TRUE : FALSE)); ?></td>
								<td><?php echo form_radio("perm_{$v['id']}", '0', set_radio("perm_{$v['id']}", '0', ( array_key_exists($v['key'], $group_permissions) && $group_permissions[$v['key']]['value'] != TRUE ) ? TRUE : FALSE)); ?></td>
								<td><?php echo form_radio("perm_{$v['id']}", 'X', set_radio("perm_{$v['id']}", 'X', ( ! array_key_exists($v['key'], $group_permissions) ) ? TRUE : FALSE)); ?></td>
							</tr>
							<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="4">There are currently no permissions to manage, please add some permissions</td>
							</tr>
						<?php endif; ?>
						</tbody>
					</table>
				</div><!-- /.box-body -->
			
				<div class="box-footer">
					<?php $this->load->view('su_general/component/elemen/elemen-button'); ?>
				</div>
			<?php echo form_close();?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->
</div><!--/.row -->
<h1></h1>

