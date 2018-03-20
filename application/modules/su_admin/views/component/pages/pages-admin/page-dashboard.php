<div class="row">

  <!--
  <div class="col-md-5">
    <div class="box box-widget widget-user-2">
      
      <div class="widget-user-header bg-yellow">
        <div class="widget-user-image">
          <img class="img-circle" src="http://cool.ridwans.com/asset//img/cloud.png" alt="User Avatar" title="User Avatar" srcset="" style="width: 65px; height: 65px;">
        </div>        
        <h3 class="widget-user-username">Information</h3>
        <h5 class="widget-user-desc">Databases</h5>
      </div>
			<?php $link = mysqli_connect('localhost', 'root', '', 'p_estocod'); ?>
      <table class="table" width="100%">
        <tbody>
          <tr>
            <td width="25%">Affected Rows</td>
            <td><b style="color:#f39c12 "><?php echo $link->affected_rows; ?></b></td>
          </tr>
          <tr>
            <td>Error Count</td>
            <td><b style="color:#f39c12 "><?php echo $link->warning_count; ?></b></td>
          </tr>
					<!--
          <tr>
            <td>Status</td>
            <td><b style="color:#f39c12 "><?php echo $link->stat; ?></b></td>
          </tr>
					--
          <tr>
            <td>PHP version</td>
            <td><b style="color:#f39c12 "><?php echo phpversion(); ?></b></td>
          </tr>
          <tr>
            <td>MySQL version</td>
            <td><b style="color:#f39c12 "><?php if (!$link){echo 'Could not connect: ' .$link->error . '<br />';} else{ echo $link->server_info;} ?></b></td>
          </tr>
          <tr>
            <td>Host</td>
            <td><b style="color:#f39c12 "><?php echo $link->host_info;?></b></td>
          </tr>
          <tr>
           	<td>Hostname</td>
           	<td><b style="color:#f39c12 "><?php echo gethostname();?></b></td>
          </tr>
          <tr>
           	<td>Database</td>
           	<td><b style="color:#f39c12 "> <?php if (!$link){echo 'Could not connect: ' .$link->error;} else{ echo 'Connected successfully <br />'; }?></b></td>
          </tr>
					<!--
          <tr>
            <td>Username</td>
            <td><b style="color:#f39c12 ">u749587875_cool</b></td>
          </tr>
					--
        </tbody>
      </table>  		
			<?php mysqli_close($link); ?>
    </div>
  </div>
  -->

	
	<!-- left column -->
	<div class="col-md-7">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Hello, ~~Nama User~~ (dinamis)</h3>
			</div><!-- /.box-header -->
			<div class="box-body">
        <p>
        Selamat datang di halaman user dashboard. Melalui halaman ini kamu bisa memantau semua data dan aktifitas yang kamu lakukan di codepolitan. Apa saja yang bisa kamu lakukan? Kamu bisa A,B, dan dll dengan website ini. (dinamis)
        </p>
        
        <h5>Jenis Akun:</h5>
				<ul>
					<?php foreach($users_groups as $group) : ?>
					<li><?php echo $group->description; ?></li>
					<?php endforeach; ?>
				</ul>

        <h5>Hak akses yang diberikan:</h5>
				<ul>
					<?php foreach($users_permissions as $permission) : ?>
					<li><strong><?php echo $permission['name']; ?></strong> (<?php if($this->ion_auth_acl->has_permission($permission['key'])) : ?>Allow<?php else: ?>Deny<?php endif; ?>)</li>
					<?php endforeach; ?>
				</ul>

			</div><!-- /.box -->
			<div class="box-footer">
				<div class="ui-group-buttons pull-right">
					<a title="View profile" target="_new" href="<?php echo base_url('user/'.$user_data->username); ?>" class="btn btn-sm btn-flat btn-default"><i class="fa fa-user fa-fw"></i>Lihat</a>
          <div class="or or-sm"></div>
					<a title="" href="<?php echo base_url('user/edit/'.encodeID($user_data->id)); ?>" class="btn btn-sm btn-flat btn-default"><i class="fa fa-edit fa-fw"></i>Setting</a>
				</div>
			</div><!-- /.box -->
		</div><!-- /.box -->
	</div><!--/.col (left) -->

	
	<!-- left column -->
	<div class="col-md-5">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Buat artikel</h3> - <small>Grup pada akun ini</small>
			</div><!-- /.box-header -->
			<div class="box-body">
        <p>
          Buatlah artikel yang bermanfaat dan dapatkan poin
        </p>
				<a href="<?php echo site_url('knowledge/add'); ?>" class="btn btn-primary btn-lg btn-block"><i class="fa fa-edit fa-fw"></i>Mulai menulis</a>
			</div><!-- /.box -->
		</div><!-- /.box -->

		<!-- general form elements -->
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Produk</h3> - <small>Grup pada akun ini</small>
			</div><!-- /.box-header -->
			<div class="box-body">
        <p>
          Tambah produk yang mau dipublikasikan, baik itu aplikasi website, desktop, maupun mobile. Pastikan aplikasi sudah siap dipakai.
        </p>
				<a href="#" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus fa-fw"></i>Tambah Produk</a>
			</div><!-- /.box -->
		</div><!-- /.box -->
	</div><!--/.col (left) -->

</div><!--/.row -->


<!--
<div class="col-sm-12">
    <div class="well well-sm"> 
		<?php
			/*
			$df = disk_free_space(".");
			$dt = disk_total_space(".");
			$du = $dt - $df;
			$dp = sprintf('%.2f',($du / $dt) * 100);

			echo $df = formatSize($df).'<br>';
			echo $du = formatSize($du).'<br>';
			echo $dt = formatSize($dt).'<br>';

			function formatSize( $bytes )
			{
				$types = array( 'B', 'KB', 'MB', 'GB', 'TB' );
				for( $i = 0; $bytes >= 1024 && $i < ( count( $types ) -1 ); $bytes /= 1024, $i++ );
					return( round( $bytes, 2 ) . " " . $types[$i] );
			}*/
		?>
    </div>
</div>
-->