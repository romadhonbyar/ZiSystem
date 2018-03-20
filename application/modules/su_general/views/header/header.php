<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php if($this->ion_auth->logged_in() ){ ?>
		<meta http-equiv="refresh" content="500;url=<?php echo site_url('logout');?>" />
		<?php } ?>
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
		<title><?php echo $title; ?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="robots" content="noindex, nofollow">
		
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/bootstrap/css/bootstrap.min.css');?>">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/font-awesome/css/font-awesome.min.css');?>">
		
		<!-- DataTables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
		
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/AdminLTE.min.css');?>">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/skins/_all-skins.min.css');?>">
		
		<!-- iCheck for checkboxes and radio inputs -->
		<!--<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/iCheck/all.css');?>">-->
		
		<!-- Select2 -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/select2/select2.min.css');?>">
		<!--<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/select2/select2-bootstrap.min.css');?>">-->

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Bootstrap time Picker -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/timepicker/bootstrap-timepicker.min.css');?>">
		<!-- bootstrap datepicker -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datepicker/datepicker3.css');?>">
		
		<!-- master css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/Master.css');?>">
		
		<!-- Validator Form -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">

		<!-- Nprogress -->
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/nprogress/nprogress.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/nprogress/support/style.css');?>">

		<!-- tag-editor -->
		<link rel="stylesheet" href="https://goodies.pixabay.com/jquery/tag-editor/jquery.tag-editor.css">
		
		<style>
			.has-error .select2-container { border: 1px solid #dd4b39; }
			@media (max-width: 767px) {
				.table-responsive .dropdown-menu {
					position: static !important;
				}
			}
			@media (min-width: 768px) {
				.table-responsive {
					overflow: visible;
				}
			}
		</style>
	</head>