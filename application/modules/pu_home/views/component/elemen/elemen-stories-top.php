<style>
.blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}
.btn-blog {
    color: #ffffff;
    background-color: #37d980;
    border-color: #37d980;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: white;
    background-color:#34ca78;
    border-color: #34ca78;
}
 .margin10{margin-bottom:10px; margin-right:10px;}
</style>

<!-- right content column-->
<div class="col-md-10" id="content">
    <div class="panel">
        <div class="panel-heading" style="background-color:#111;color:#fff;">Top Stories</div>
        <div class="panel-body">


            <!--
            <?php //if($knowledge_data){ foreach($knowledge_data as $ad){?>
            <h2>CSS3</h2>
            <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right"> <?php echo word_limiter($ad['content_knowledge'] , 50, '');?>
            <br>
            <br>
            <button class="btn btn-default">More</button>
            <?php //}} else { ?>
            <div class="well well-lg">
                <h1><i class="fa fa-hashtag"></i> No knowledge!</h1> Sorry, there is no knowledge on this site. The use of this blog check out again.
            </div>
            <?php //} ?>
            -->

        <div id="results"></div>

        <!--
		<div class="list-group tutorial_list_note">
			<?php 
                // echo "knowledge_num".$knowledge_num."knowledge_num";
                // echo "x".$limit_view_knowledge."x";
				// if($knowledge_data){ foreach($knowledge_data as $ad){
				// 	echo "id_knowledge".$tutorial_id = $ad['id_knowledge'];
			?>
            
            <h2><?php //echo word_limiter($ad['title_knowledge'] , 50, '');?></h2>
            <img src="//placehold.it/150x100/EEEEEE" class="img-responsive pull-right"> 
            <?php //echo word_limiter($ad['content_knowledge'] , 50, '');?> ...
                    <?php //echo br(2);?>
			
			<?php //} if($knowledge_num != $limit_view_knowledge){ ?>
				<?php //if($knowledge_num > $limit_view_knowledge){ ?>
					<div class="show_more_main_note" id="show_more_main_note<?php //echo $tutorial_id; ?>">
						<span id="<?php //echo $tutorial_id; ?>" class="show_more_note" title="Load more notes">Show more</span>
						<span class="loding_note" style="display: none;"><span class="loding_txt_note">Loading...</span></span>
					</div>
				<?php //} ?>
			<?php  //} } else { ?>
				<a class="list-group-item pjax" title="Tidak ada data" href="#" >
						
					<div class="row">
						<div class="col-sm-12">
							<p class="list-group-item-text">
                                null
							</p>
						</div>
					</div>
				</a>
			<?php //} ?>
		</div>
        -->


            <hr>
            <h2>Quote</h2> 
            <blockquote>Tidak menyerah meskipun itu Sulit!</blockquote>
            <hr>
            <div class="well">
                <h1>Well..</h1> Does anyone know why <a href="#">@mdo</a> or <a href="#">@fat</a> would name this element a "well"?
            </div>
        </div>
        <!--/panel-body-->
    </div>
    <!--/panel-->
    <!--/end right column-->
</div>