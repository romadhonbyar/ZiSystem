	<!--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>-->
	<script src="<?php echo base_url('assets/backend/plugins/jQuery/jquery-1.10.2.min.js');?>"></script>
	<script src="<?php echo base_url('assets/backend/bootstrap/js/bootstrap.min.js');?>"></script>

	<!-- Validator Form -->
	<?php $this->load->view('su_general/footer/footer-other/other-validation'); ?>
	<!-- Max Char -->
	<?php if( $url2 == "setting" and ($url3 == "seo")){$this->load->view('su_general/footer/footer-other/max-char');} ?>
	<!-- Ajax CRUD -->
	<?php if( $url2 == "data"){$this->load->view('su_general/footer/footer-other/g-ajax');} ?>
	<!-- DataTables -->
	<?php $this->load->view('su_general/footer/footer-other/other-datatables'); ?>
	<!-- Nprogress -->
	<?php $this->load->view('su_general/footer/footer-other/other-nprogress'); ?>
	<!-- AutoSave -->
	<?php if( $url2 == "update_knowledge" or 
						$url2 == "add_category" or
						$url2 == "update_category"){
						$this->load->view('su_general/footer/footer-other/other-autosave');
						$this->load->view('su_general/footer/footer-other/other-tag-editor');
						} ?>


	<!-- Select2 -->
	<?php //$this->load->view('su_general/footer/footer-other/other-select2'); ?>
	<!-- InputMask -->
	<?php //$this->load->view('su_general/footer/footer-other/other-inputmask'); ?>

	<!-- date-range-picker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="<?php echo base_url('assets/backend/plugins/daterangepicker/daterangepicker.js');?>"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url('assets/backend/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
	<!-- bootstrap time picker -->
	<script src="<?php echo base_url('assets/backend/plugins/timepicker/bootstrap-timepicker.min.js');?>"></script>
	<!-- SlimScroll 1.3.0 -->
	<script src="<?php echo base_url('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url('assets/backend/plugins/iCheck/icheck.min.js');?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/backend/plugins/fastclick/fastclick.js');?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/backend/dist/js/app.js');?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/backend/dist/js/demo.js');?>"></script>
	<!-- pnotify -->
	<script src="<?php echo base_url('assets/backend/plugins/pnotify/pnotify.custom.min.js');?>"></script>

	<script>
		$(function () {
			/*Date picker*/
			$('.datepicker').datepicker({
				endDate: "+",
				format: "dd/mm/yyyy",
				language: "id",
				autoclose: true,
			});

			/*iCheck for checkbox and radio inputs*/
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			  checkboxClass: 'icheckbox_minimal-blue',
			  radioClass: 'iradio_minimal-blue'
			});
			/*Red color scheme for iCheck*/
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			  checkboxClass: 'icheckbox_minimal-red',
			  radioClass: 'iradio_minimal-red'
			});
			/*Flat red color scheme for iCheck*/
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
			  checkboxClass: 'icheckbox_flat-green',
			  radioClass: 'iradio_flat-green'
			});

			/*Timepicker*/
			$(".timepicker").timepicker({
			  showInputs: false
			});
		});
	</script>

	<?php $this->load->view('su_general/footer/footer-other/noscript'); ?>
	
  </body>
</html>