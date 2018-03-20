<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<img src="<?php echo base_url('assets/backend/dist/img/kopma.png');?>" class="user-image" alt="User Image">
		<span class="hidden-xs">
			<?php echo ucfirst(word_limiter($this->session->full_name,2)); ?>
		</span>
	</a>
	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header">
			<img src="<?php echo base_url('assets/backend/dist/img/kopma.png');?>" class="img-circle" alt="User Image">
			<p>
			<?php echo $string = ucfirst(word_limiter($this->session->nia,2));?> - <?php 
				foreach($this->ion_auth->get_users_groups()->result() as $group) : 
					echo $group->description; 
				endforeach; ?>
			<small>Sekarang tahun <?php echo date('Y');?></small>
			</p>
		</li>
		<!-- Menu Body --
		<li class="user-body">
			<div class="col-xs-4 text-center">
			<a href="#">Followers</a>
			</div>
			<div class="col-xs-4 text-center">
			<a href="#">Sales</a>
			</div>
			<div class="col-xs-4 text-center">
			<a href="#">Friends</a>
			</div>
		</li>-->
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
			<?php
				$key = "k0pM4";
				$id_user_encode = $this->encrypt->encode($id_user, $key, true);
			?>
			<a href="<?php echo base_url('edit_user/'.$id_user_encode); ?>" class="btn btn-default btn-flat"><i class="fa fa-user fa-fw"></i>Profil</a>
			</div>
			<div class="pull-right">
			<a href="<?php echo base_url('logout');?>" class="btn btn-warning btn-flat"><i class="fa fa-sign-out fa-fw"></i>Keluar</a>
			</div>
		</li>
	</ul>
</li>