<div class="row">

	<!-- left column -->
	<div class="col-md-7">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user fa-fw"></i>Details Profile</h3> - <small>Details profile <?php echo $user_data->full_name; ?></small>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="well well-sm" style="font-size:15px;">
					Status <span class="pull-right"><?php if($user_data->active == 1){?><span class="pull-right badge bg-green">Aktif</span><?php }else{ ?><span class="pull-right badge bg-green">Tidak aktif</span><?}?></span><br>
					Nama <span class="pull-right"><?php echo $user_data->full_name; ?></span><br>
					Username <span class="pull-right"><?php echo $user_data->username; ?></span><br>
					Email <span class="pull-right"><?php echo $user_data->email; ?></span><br>
					Terakhir login <span class="pull-right"><?php if($user_data->last_login){ echo $last_login = unTohum($user_data->last_login);}else{ echo $last_login = "NULL"; } ?></span><br>
					Tanggal dibuat <span class="pull-right"><?php echo unTohum($user_data->created_on); ?></span><br>
					Group   <span class="pull-right">
								<ul>
									<?php foreach($users_groups as $group) : ?>
									<li><?php echo $group->description; ?></li>
									<?php endforeach; ?>
								</ul>
							</span><br>
				</div>
			</div><!-- /.box -->
			<div class="box-footer">
				<div class="ui-group-buttons pull-right">
					<a href="<?php echo base_url('mengelola/users'); ?>" class="btn btn-xs btn-flat btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back to list</a>
					<div class="or or-xs"></div>
					<a title="Edit Profile" href="<?php echo base_url('user/edit/'.encodeID($user_data->id)); ?>" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
				</div>
			</div><!-- /.box -->
		</div><!-- /.box -->

		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-universal-access fa-fw"></i>Wewenang Pengguna</h3> - <small>Wewenang pada akun ini</small>
			</div><!-- /.box-header -->
			<div class="box-body">
				<ul>
					<?php foreach($users_permissions as $permission) : ?>
					<li><strong><?php echo $permission['name']; ?></strong> (<?php if($this->ion_auth_acl->has_permission($permission['key'])) : ?>Allow<?php else: ?>Deny<?php endif; ?>)</li>
					<?php endforeach; ?>
				</ul>
			</div><!-- /.box -->
			<div class="box-footer">
				<div class="ui-group-buttons pull-right">
					<a title="Edit Permissions" href="<?php echo base_url('user/permissions/'.encodeID($user_data->id)); ?>" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
				</div>
			</div><!-- /.box -->
		</div><!-- /.box -->
		
	</div><!--/.col (left) -->
	
	<!-- left column -->
	<div class="col-md-5">

		<!-- general form elements -->
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-list fa-fw"></i>Logs Aktifitasnya</h3> - <small>...</small>
			</div><!-- /.box-header -->
			<div class="box-body">
				Logs Aktifitas ...
			</div><!-- /.box -->
			<div class="box-footer">
				<div class="ui-group-buttons pull-right">
					<a href="<?php echo base_url('user/edit/'.encodeID($user_data->id)); ?>" class="btn btn-xs btn-flat btn-warning"><i class="fa fa-edit fa-fw"></i>Edit</a>
				</div>
			</div><!-- /.box -->
		</div><!-- /.box -->

	</div><!--/.col (left) -->

</div><!--/.row -->
