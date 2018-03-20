<!-- User Account: style can be found in dropdown.less -->
<?php $get_my = $this->ion_auth->user($this->session->id)->row();?>
<li class="user user-menu">
	<a href="<?php echo site_url('user/edit/'.encodeID($get_my->id)); ?>" title="Profile <?php echo ucfirst(word_limiter($this->session->full_name,2)); ?>" class="active">
		<i class="fa fa-user"></i>
		<span class="hidden-xs">
			<?php echo ucfirst(word_limiter($this->session->full_name,2)); ?>
		</span>
	</a>
</li>
<li class="user user-menu">
	<a href="<?php echo site_url('logout');?>" title="Keluar dari sistem">
		<i class="fa fa-sign-out"></i>
		<span class="hidden-xs">
			Logout
		</span>
	</a>
</li>