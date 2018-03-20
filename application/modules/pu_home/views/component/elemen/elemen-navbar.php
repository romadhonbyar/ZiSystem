<nav class="navbar navbar-static">
   <div class="container">
    <div class="navbar-header">
      <?php if($general_data){ ?>
        <a class="navbar-brand" href="<?php if($url2 != 'index'){echo base_url();}else{echo '#';}?>" title="<?php echo $general_data['slogan_web'];?>">
        <b><?php echo ucfirst($general_data['name_web']);?></b>
        </a>
      <?php } else { ?>
        <a class="navbar-brand" href="#"><b>Zlogs</b></a>
      <?php }  ?>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="fa fa-chevron-down"></span>
      </a>
    </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">  
          <li><a href="#">About</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Channels</a>
            <ul class="dropdown-menu">
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              <li><a href="#">Sub-link</a></li>
              
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
     				<button type="submit" class="btn btn-default pull-right"><i class="fa fa-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                </form>
             </ul>
          </li>
          <?php if (!$this->ion_auth->logged_in()){ ?>
          <li><a href="<?php echo site_url('login');?>" title="Login"><i class="fa fa-sign-in"></i></a></li>
          <?php } else { ?>
          <li><a href="<?php echo site_url('dashboard');?>" title="Dashboard"><i class="fa fa-dashboard"></i></a></li>
          <li><a href="<?php echo site_url('logout');?>" title="Logout"><i class="fa fa-sign-out"></i></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
</nav><!-- /.navbar -->