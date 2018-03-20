<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>
          <?php if($general_data){ ?>
          <a href="<?php if($url2 != 'index'){echo base_url();}else{echo '#';}?>" title="<?php echo $general_data['name_web'];?>"><?php echo $general_data['name_web'];?></a>
          <p class="lead"><?php echo $general_data['slogan_web'];?></p>
          <?php } else { ?>
          <a href="#" title="Title website">Zlogs</a>
          <p class="lead">My awesome blog</p>
          <?php }  ?>
        </h1>
      </div>
      <div class="col-md-6">
        <div class="well pull-right">
          <img src="//placehold.it/280x100/E7E7E7">        
        </div>
      </div>
    </div>
  </div>
</header>
