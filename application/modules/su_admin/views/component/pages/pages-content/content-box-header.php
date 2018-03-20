<div class="box-header">
	<h3 class="box-title">
		<?php if($url3 == "permissions"){ ?>Mengelola Wewenang
		<?php }else if($url3 == "groups"){ ?>Mengelola Grup
		<?php }else if($url3 == "users"){ ?>Mengelola Anggota
		<?php } ?>
	</h3>
	<div class="btn-group pull-right">
		<?php if($url3 == "users" or 
				 $url3 == "permissions" or
				 $url3 == "users" or 
				 $url3 == "groups" or 
				 $url3 == "faculty" or
				 $url3 == "study_program"
				){ ?>
			<?php if($url3 == "users"){ ?><a href="<?php echo site_url('/user/add');?>" class="btn btn-sm btn-flat btn-success" ><i class="fa fa-plus"></i> User</a>
			<?php } else if($url3 == "groups"){ ?><a href="<?php echo site_url('/group/add');?>" class="btn btn-sm btn-flat btn-success" ><i class="fa fa-plus"></i> Group</a>
			<?php } else if($url3 == "permissions"){ ?><a href="<?php echo site_url('/permission/add');?>" class="btn btn-sm btn-flat btn-success" ><i class="fa fa-plus"></i> Permission</a>
			<?php } ?>
		<?php } ?>
		<button type="button" class="btn btn-sm btn-flat btn-default" onclick="reload_table()">
			<i class="fa fa-refresh"></i> Refresh
		</button>
    </div>
</div><!-- /.box-header -->