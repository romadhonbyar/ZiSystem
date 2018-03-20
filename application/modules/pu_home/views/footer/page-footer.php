<footer>
  <p>© <?php echo date('Y');?>
		<a style="color:#0a93a6; text-decoration:none;" href="#">
			<?php if($general_data){ ?>
				<?php echo ucfirst($general_data['name_web']);?>
			<?php } else { ?>Zlogs<?php }  ?>
		</a>, All rights reserved.</p>
</footer>

<style>
/* Footer */
footer{
   background-color: #0c1a1e;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
</style>
	
<!--
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="copyright">
						© <?php echo date('Y');?>. 
						<?php if($general_data){ ?>
							<?php echo ucfirst($general_data['name_web']);?>
						<?php } else { ?>
							Zlogs
						<?php }  ?>. All Rights Reserved.
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="design">
						<a href="http://EstoCod.com">EstoCod </a> |  <a target="_blank" href="http://www.webenlance.com">Template by Webenlance</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<style>
	footer { 
   		/*position:fixed;
		left:0px;
		bottom:0px;
		*/
		background-color: #15224f;    
		min-height: 40px;    
		width: 100%;
	}
	.copyright {    
		color: #fff;    
		line-height: 30px;    
		min-height: 30px;    
		padding: 10px 0;
	}
	.design {    
		color: #fff;    
		line-height: 30px;    
		min-height: 30px;    
		padding: 10px 0;
  		text-align: right;
	}
	.design a {
		color: #fff;
	}
	</style>
-->
	<!-- script references -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/frontend/js/bootstrap.min.js');?>"></script>
	<script src="<?php //echo base_url('assets/frontend/js/scripts.js');?>"></script>
	<script src="<?php echo base_url('assets/frontend/js/custom.js');?>"></script>

	<!-- infinite-scroll -->
	<?php $this->load->view('pu_home/footer/footer-other/other-infinite-scroll'); ?>
	
		<!--
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).on('click','.show_more_note',function(){
					var ID = $(this).attr('id');
					console.log(ID);
					$('.show_more_note').hide();
					$('.loding_note').show();
					$.ajax({
						type:"POST",
						url:'<?php echo base_url('pu_home/more/'); ?>',
						data:'id='+ID,
						success:function(html){
							$('#show_more_main_note'+ID).remove();
							$('.tutorial_list_note').append(html);
							
							//jQuery("abbr.timeago").timeago();
						},
						error: function(data){
							alert("fail");
						}
					});
					
				});
			});
		</script>
		-->

	</body>
</html>