<!DOCTYPE html>
<html lang="id">
	<head><!-- Meta -->
		<?php $this->load->view('pu_home/header/page-header-meta'); ?>
    <link rel="shortcut icon" href="?php echo base_url('assets/frontend/ico/favicon.png');?>">
    <title><?php if($title){echo $title;}else{echo "Ini sebuah halaman";}?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/frontend/css/bootstrap.min.css');?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/frontend/font-awesome/css/font-awesome.min.css');?>">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url('assets/frontend/css/styles.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/frontend/css/custom.css');?>" rel="stylesheet">
	</head>
	<body>