<?php if($message == TRUE){?>
	<div class="alert alert-warning fade in">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo $message; ?>
	</div>
<?php } ?>
<?php if($this->session->flashdata('success') == TRUE){ ?>
	<div class="alert alert-success fade in">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
<?php } ?>
<?php if($this->session->flashdata('danger') == TRUE){ ?>
	<div class="alert alert-danger fade in">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo $this->session->flashdata('danger'); ?>
	</div>
<?php } ?>
<?php if($this->session->flashdata('warning') == TRUE){ ?>
	<div class="alert alert-warning fade in">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo $this->session->flashdata('warning'); ?>
	</div>
<?php } ?>