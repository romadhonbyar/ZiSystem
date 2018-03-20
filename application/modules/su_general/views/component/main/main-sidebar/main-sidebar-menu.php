<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($url2 == "dashboard"){echo 'active';}?>">
			<a href="<?php echo site_url('dashboard'); ?>">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				<!--
				<span class="pull-right-container">
					<small class="label pull-right bg-green">new</small>
				</span>
				-->
			</a>
        </li>
		
		<?php if($this->ion_auth_acl->has_permission('menu_knowledge')){ ?>
		<li class="<?php if(
							$url2 == "update_knowledge" or 
							($url2 == "data" and 
							($url3 == "draft" or 
							$url3 == "publish" or $url3 == "category") )						
							){echo 'active';}?> treeview">
			<a href="#">
				<i class="fa fa-newspaper-o"></i>
				<span>knowledge</span> 
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if($url3 == "add"){echo 'active';}?>">
					<a  href="<?php echo site_url('knowledge/add'); ?>"><i class="fa fa-plus"></i> 
						<span>Add</span> 
					</a>
				</li>

				<?php if($this->ion_auth_acl->has_permission('menu_knowledge_category')){ ?>
				<li class="<?php if($url3 == "category"){echo 'active';}?>">
					<a  href="<?php echo site_url('knowledge/category'); ?>"><i class="fa fa-tag"></i> 
						<span>Category</span> 
					</a>
				</li>
				<?php } ?>
				
				<li class="<?php if($url3 == "draft"){echo 'active';}?>">
					<a  href="<?php echo site_url('knowledge/draft'); ?>"><i class="fa fa-archive"></i> 
						<span>Draft</span> <span class="label label-primary pull-right"><?php echo $this->m_knowledge->count_all($id_user, 1)?></span>
					</a>
				</li>
				<li class="<?php if($url3 == "publish"){echo 'active';}?>">
					<a  href="<?php echo site_url('knowledge/publish'); ?>"><i class="fa fa-users"></i> 
						<span>Publish</span> <span class="label label-primary pull-right"><?php echo $this->m_knowledge->count_all($id_user, 2)?></span>
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>

		<?php if($this->ion_auth_acl->has_permission('menu_manage')){ ?>
		<li class="<?php if(
							$url2 == "data" and (
							$url3 == "permissions" or 
							$url3 == "groups" or 
							$url3 == "users")
							
							){echo 'active';}?> treeview">
			<a href="#">
				<i class="fa fa-gears"></i>
				<span>Manage</span> 
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if($url3 == "users"){echo 'active';}?>">
					<a  href="<?php echo site_url('manage/users'); ?>"><i class="fa fa-users"></i> 
						<span>User's</span> 
					</a>
				</li>
				<li class="<?php if($url3 == "groups"){echo 'active';}?>">
					<a  href="<?php echo site_url('manage/groups'); ?>"><i class="fa fa-th-large"></i> 
						<span>Group's</span> 
					</a>
				</li>
				<li class="<?php if($url3 == "permissions" or $url2 == "update_permission"){echo 'active';}?>">
					<a  href="<?php echo site_url('manage/permissions'); ?>"><i class="fa fa-flag"></i> 
						<span>Permission's</span> 
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>

		<?php if($this->ion_auth_acl->has_permission('menu_setting')){ ?>
		<!-- menu setting -->
		<li class="<?php if(
							$url2 == "setting" and  ( $url3 == "general" or $url3 == "seo" or $url3 == "infoweb" or $url3 == "socmed")							
							){echo 'active';}?> treeview">
			<a href="#">
				<i class="fa fa-wrench"></i>
				<span>Setting</span> 
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if($url3 == "general"){echo 'active';}?>">
					<a  href="<?php echo site_url('setting/general'); ?>"><i class="fa fa-universal-access"></i> 
						<span>General</span> 
					</a>
				</li>
				<li class="<?php if($url3 == "seo"){echo 'active';}?>">
					<a  href="<?php echo site_url('setting/seo'); ?>"><i class="fa fa-globe"></i> 
						<span>SEO</span> 
					</a>
				</li>
				<li class="<?php if($url3 == "socmed"){echo 'active';}?>">
					<a  href="<?php echo site_url('setting/socmed'); ?>"><i class="fa fa-share-alt"></i> 
						<span>Social Media</span> 
					</a>
				</li>
			</ul>
		</li>
		<?php } ?>
		
		<!-- menu logs -->
		<?php if($this->ion_auth_acl->has_permission('menu_logs')){ ?>
        <li class="<?php if(($url2 == "data" and  ( $url3 == "log_activity" )) ){echo 'active';}?>">
			<a href="<?php echo site_url('data/log_activity'); ?>">
				<i class="fa fa-history"></i> <span>Logs</span>
			</a>
        </li>
		<?php } ?>
		
		<!-- menu view website -->
        <li>
			<a href="<?php echo base_url(); ?>" target="_new">
				<i class="fa fa-external-link-square"></i> <span>View website</span>
			</a>
        </li>
		
	</ul>
