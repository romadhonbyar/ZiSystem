
<div class="row">

	<!-- left column -->
	<div class="col-md-7">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user fa-fw"></i>Rincian Pengguna</h3> - <small>Rincian profil Anda</small>
			</div><!-- /.box-header -->

			<!-- form start -->
			<?php $attribute= array( 'id'=>'my_form','class' => 'my_form'); echo form_open($this->uri->uri_string(), $attribute);?>
			<div class="box-body">
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Allow</th>
                            <th>Deny</th>
                            <th>Inherited From Group</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($permissions) : ?>
                        <?php foreach($permissions as $k => $v) : ?>
                        <tr>
                            <td><?php echo $v['name']; ?></td>
                            <td><?php echo form_radio("perm_{$v['id']}", '1', set_radio("perm_{$v['id']}", '1', $this->ion_auth_acl->is_allowed($v['key'], $users_permissions))); ?></td>
                            <td><?php echo form_radio("perm_{$v['id']}", '0', set_radio("perm_{$v['id']}", '0', $this->ion_auth_acl->is_denied($v['key'], $users_permissions))) ?></td>
                            <td><?php echo form_radio("perm_{$v['id']}", 'X', set_radio("perm_{$v['id']}", 'X', ( $this->ion_auth_acl->is_inherited($v['key'], $users_permissions) || ! array_key_exists($v['key'], $users_permissions)) ? TRUE : FALSE)); ?> (Inherit <?php echo ($this->ion_auth_acl->is_inherited($v['key'], $group_permissions, 'value')) ? "Allow" : "Deny"; ?>)</td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">There are currently no permissions to manage, please add some permissions</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
			</div><!-- /.box -->

			<div class="box-footer">
				<div class="ui-group-buttons pull-right">
                    <?php echo form_submit('save', 'Save'); ?>
                    <?php echo form_submit('cancel', 'Cancel'); ?>
                    <!--
					<a href="<?php echo base_url('mengelola/users'); ?>" class="btn btn-xs btn-flat btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back to list</a>
					<div class="or or-xs"></div>
					<a href="<?php echo base_url('user/edit/'.encodeID($user_data->id)); ?>" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-edit fa-fw"></i>Edit Profile</a>
                    -->
				</div>
			</div><!-- /.box -->
			<?php echo form_close();?>
		</div><!-- /.box -->
	</div><!--/.col (left) -->

</div><!--/.row -->




<!--
<h1>Manage User Permissions</h1>

<ul>
    <li><?php echo anchor("/admin/manage_user/{$user_id}", 'Back to user'); ?></li>
</ul>


<?php if($message){ echo $message; } ?>

<?php echo form_open(); ?>



<p>
</p>

<?php echo form_close(); ?>
-->