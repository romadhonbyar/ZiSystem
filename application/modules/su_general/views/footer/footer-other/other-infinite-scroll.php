<script type="text/javascript">
$(document).ready(function() {
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;  
$('#results').load("<?php echo base_url() ?>pu_home/more",
 {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
          loading = true; 
          $('.loader_image').show(); 
          $.post('<?php echo site_url() ?>pu_home/more',{'group_no': total_record},
            function(data){ 
                if (data != "") {                               
                    $("#results").append(data);                 
                    $('.loader_image').hide();                  
                    total_record++;
                }
            });     
        }
    }
});
});
</script>