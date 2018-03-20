<div class="btn-group pull-right">
<a href="<?php
	if($url2 == "permissions"){ $page = 'permissions';}
	elseif($url2 == "groups"){ $page = 'groups';}
	elseif($url2 == "create_user"){ $page = 'users';}
	elseif($url2 == "faculty"){ $page = 'faculty';}
	elseif($url2 == "study_program"){ $page = 'study_program';}
	elseif($url2 == "penka"){ $page = 'users';}

	echo base_url('data/'.$page);
?>" class="pull-right btn btn-warning btn-flat btn-xs"><i class="fa fa-mail-reply fa-fw"></i> Kembali</a>
</div>