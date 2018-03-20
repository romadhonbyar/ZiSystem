<!-- get data ajax -->
<script type="text/javascript">
	function reload_table(){
		table.ajax.reload(null,false); /* reload datatable ajax  */
	}
	function reload_page(){
		location.reload(); /* reload page ajax  */
	}
	/*
	var csfrData = {};
		csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo
		$this->security->get_csrf_hash(); ?>';
		$.ajaxSetup({
		data: csfrData
	});
	*/
	
/*<![CDATA[ */
	var save_method; /* for save method string */
    var table;
    $(document).ready(function() {
		table = $('#table').DataTable({
			"processing": true, /* Feature control the processing indicator., */
			"language": {
				"processing": "<img src='<?php echo base_url('assets/backend/dist/img/load.gif'); ?>' />" /* add a loading image,simply putting <img src="loader.gif" /> tag. */
			},
			"serverSide": true, /* Feature control DataTables' server-side processing mode. */
			
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"stateSave": true,
			
			"order": [], /* Initial no order. */
			
			<?php 
				if($url3 == 'users' or 
				   $url3 == 'groups' or
				   $url3 == 'permissions' or
				   $url3 == 'draft' or 
				   $url3 == 'category'
				)
			{?>
			"aoColumns": [
							<?php if($url3 == 'users'){?>{ "bSortable": false }, null, null, null, null
							<?php } else if($url3 == 'groups'){?>{ "bSortable": false }, null, null, null, null
							<?php } else if($url3 == 'permissions'){?>{ "bSortable": false }, null, null
							<?php } else if($url3 == 'draft'){?>{ "bSortable": false }, null, null, null, null
							<?php } else if($url3 == 'publish'){?>{ "bSortable": false }, null, null, null, null
							<?php } else if($url3 == 'category'){?>{ "bSortable": false }, null, null, null
							<?php } else {?>
							<?php } ?>
						],			
			<?php } ?>
		
		
			/* Load data for the table's content from an Ajax source */
			"ajax": {
				
			<?php if($url3 == "users"){ ?> "url": "<?php echo base_url('c_data/c_users/ajax_list')?>",
			<?php } else if($url3 == "permissions"){ ?> "url": "<?php echo base_url('c_data/c_permissions/ajax_list')?>",
			<?php } else if($url3 == "groups"){ ?> "url": "<?php echo base_url('c_data/c_groups/ajax_list')?>",
			<?php } else if($url3 == "draft"){ ?> "url": "<?php echo base_url('c_data/c_knowledge_draft/ajax_list')?>",
			<?php } else if($url3 == "publish"){ ?> "url": "<?php echo base_url('c_data/c_knowledge_publish/ajax_list')?>",
			<?php } else if($url3 == "category"){ ?> "url": "<?php echo base_url('c_data/c_knowledge_category/ajax_list')?>",
			
			<?php } ?>
			
				"type": "POST",
				/* success: function(data) { alert("succsess") }, */
				/* error: function(ts) { alert(ts.responseText) } */
			},
			/* Set column definition initialisation properties. */
			"columnDefs": [
				{ 
					"targets": [ -1 ], /* last column */
					"orderable": false, /* set not orderable */
					"searchable": false,
					"orderable": false,
					"visible": true 
				},
			],
		});
    });

	
    function delete_person(id) {
		if(confirm('Are you sure delete this data?')){
			/* ajax delete data to database */
			//console.log(id);
			$.ajax({
			<?php if($url3 == "users"){ ?>url : "<?php echo base_url('c_data/c_users/ajax_delete')?>/"+id,
			<?php } else if($url3 == "permissions"){ ?>url : "<?php echo base_url('c_data/c_permissions/ajax_delete')?>/"+id,
			<?php } else if($url3 == "groups"){ ?>url : "<?php echo base_url('c_data/c_groups/ajax_delete')?>/"+id,
			<?php } else if($url3 == "draft"){ ?>url : "<?php echo base_url('c_data/c_knowledge_draft/ajax_delete')?>/"+id,
			<?php } else if($url3 == "publish"){ ?>url : "<?php echo base_url('c_data/c_knowledge_publish/ajax_delete')?>/"+id,
			<?php } else if($url3 == "category"){ ?>url : "<?php echo base_url('c_data/c_knowledge_category/ajax_delete')?>/"+id,
			<?php } ?>
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					/* if success reload ajax table */
					/* $('#modal_form').modal('hide'); */
					reload_table();
				   
					/* PNotify Desktop */
					PNotify.desktop.permission();
					(new PNotify({
						title: 'Hapus!',
						text: 'Hore, data telah berhasil dihapus.',
						type: 'success',
						desktop: {
							desktop: true
						}
					})).get().click(function(e) {
						if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
						alert('Hey! You clicked the desktop notification!');
					});
				},  
				error: function ()  /* error: function (jqXHR, textStatus, errorThrown) */
				{
					alert('Error deleting data');
				}
			});
		}
    }

	function publish_(id) {
		if(confirm('Are you sure publish this knowledge?')){
			/* ajax delete data to database */
			$.ajax({
			<?php if($url3 == "draft"){ ?>url : "<?php echo base_url('c_data/c_knowledge_publish/ajax_publish')?>/"+id,
			<?php } ?>
				type: "POST",
				dataType: "JSON",
				success: function(data) {
					/* if success reload ajax table */
					reload_page();
					reload_table();
				   
					/* PNotify Desktop */
					PNotify.desktop.permission();
					(new PNotify({
						title: 'Hapus!',
						text: 'Hore, knowledge telah berhasil dipublish.',
						type: 'success',
						desktop: {
							desktop: true
						}
					})).get().click(function(e) {
						if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
						alert('Hey! You clicked the desktop notification!');
					});
				},  
				error: function ()  /* error: function (jqXHR, textStatus, errorThrown) */
				{
					alert('Error publishing knowledge!');
				}
			});
		}
    }
	
/* ]]> */
</script>