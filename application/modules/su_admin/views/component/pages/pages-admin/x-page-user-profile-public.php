<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="http://lorempixel.com/180/180/people/9/" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1>Eli Macy</h1>
            <p>Girls just wanna go fun.</p>
        </div>
    </div>
</div> <!-- /container -->  


<div class="row">

	<!-- left column -->
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-user fa-fw"></i>Details Profile</h3> - <small>Details profile <?php echo $user_data->full_name; ?></small>
			</div><!-- /.box-header -->
			<div class="box-body">
				<div class="well well-sm">

				<h3><?php echo $user_data->full_name; ?></h3>

				Status <span class="pull-right"><?php if($user_data->active == 1){?><span class="pull-right badge bg-green">Aktif</span><?php }else{ ?><span class="pull-right badge bg-green">Tidak aktif</span><?}?></span><br>
				Nama <span class="pull-right"><?php echo $user_data->full_name; ?></span><br>
				Username <span class="pull-right"><?php echo $user_data->username; ?></span><br>
				Email <span class="pull-right"><?php echo $user_data->email; ?></span><br>
				Terakhir login <span class="pull-right"><?php if($user_data->last_login){ echo $last_login = unTohum($user_data->last_login);}else{ echo $last_login = "NULL"; } ?></span><br>
				Tanggal dibuat <span class="pull-right"><?php echo unTohum($user_data->created_on); ?></span><br>
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
	</div><!--/.col (left) -->

</div>