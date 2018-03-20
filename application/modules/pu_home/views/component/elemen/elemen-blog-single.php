<?php if($knowledge_data){ ?>
<div class="container">
    <div class="row">
        <!-- SINGLE POST -->
        <div class="col-lg-8" style="background-color:#FFFFFF;">
            <!-- Blog Post 1 -->
            <a href="single-post.html">
                <h2><?php echo $knowledge_data['title_knowledge'];?></h2>
            </a>
            <p>
                <small><?php echo unTohum($knowledge_data['create_knowledge']);?></small>
                <!--|<small>By: <?php //echo whoIs(1);?></small>-->
            </p>
            <!--<img src="http://placehold.it/900x300" class="img-responsive img-post">-->
            <p><? echo $knowledge_data['content_knowledge'];?></p>
            <div class="spacing"></div>
            <h6>FILE:</h6>
            <?php
                $type_knowledge= $knowledge_data['type_knowledge'];
                $link_knowledge= $knowledge_data['link_knowledge'];
                $name_knowledge= $knowledge_data['name_knowledge'];
                /** 1=gambar;2=file(pdf,word,rar);3=video;4=suara; */
                if($type_knowledge==1){
                    echo '<img 
                           class="img-responsive" src="'.$link_knowledge.'" 
                           title="'.$name_knowledge.'-'.$knowledge_data['title_knowledge'].'"
                           alt="'.$name_knowledge.'-'.$knowledge_data['title_knowledge'].'"
                          >';
                }else if($type_knowledge==2){
                    echo '<a 
                            href="'.$link_knowledge.'"
                            title="'.$name_knowledge.'-'.$knowledge_data['title_knowledge'].'"                    
                          >'.$name_knowledge.'</a>';
                }
            ?>
            <h6>SHARE:</h6>
            <p class="share">
                <a href="#">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#">
                    <i class="fa fa-tumblr"></i>
                </a>
                <a href="#">
                    <i class="fa fa-google-plus"></i>
                </a>
            </p>
        </div>
        <!-- /col-lg-8 -->

        <!--  SIDEBAR -->
        <div class="col-lg-4">
            <h4>Categories</h4>
            <div class="hline"></div>
            <p>
                <a href="#">
                    <i class="fa fa-angle-right"></i> Wordpress
                </a>
                <span class="badge badge-theme pull-right">9</span>
            </p>
            <p>
                <a href="#">
                    <i class="fa fa-angle-right"></i> Photoshop
                </a>
                <span class="badge badge-theme pull-right">3</span>
            </p>
            <hr>
            <h4>Popular Tags</h4>
            <div class="hline"></div>
            <p>
                <a class="label label-default btn btn-theme" href="#" role="button">Design</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Wordpress</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Flat</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Modern</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Wallpaper</a>
                <a class="label label-default btn btn-theme" href="#" role="button">HTML5</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Pre-processor</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Developer</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Windows</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Phothosop</a>
                <a class="label label-default btn btn-theme" href="#" role="button">UX</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Interface</a>
                <a class="label label-default btn btn-theme" href="#" role="button">UI</a>
                <a class="label label-default btn btn-theme" href="#" role="button">Blog</a>
            </p>
        </div>
    </div>
    <!-- --/row ---->
</div>
<?php } ?>

<style>
.img-post{
    margin-bottom: 10px;
}
</style>