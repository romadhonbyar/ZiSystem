<div class="box-header">
	<h3 class="box-title">
		<?php if($url3 == "draft"){ ?>Mengelola draft
		<?php }else if($url3 == "publish"){ ?>Mengelola publish
		<?php }else if($url3 == "category"){ ?>Mengelola category
		<?php } ?>
	</h3>
	<div class="btn-group pull-right">
		<?php if($url3 == "draft" or 
				 $url3 == "publish" or
				 $url3 == "category"
				){ ?>
			<?php if($url3 == "category"){ ?><a href="<?php echo base_url('/category/add');?>" class="btn btn-sm btn-flat btn-success" ><i class="fa fa-plus"></i> Category</a>
			<?php } ?>
		<?php } ?>
		<button type="button" class="btn btn-sm btn-flat btn-default" onclick="reload_table()">
			<i class="fa fa-refresh"></i> Refresh
		</button>
    </div>
</div><!-- /.box-header -->