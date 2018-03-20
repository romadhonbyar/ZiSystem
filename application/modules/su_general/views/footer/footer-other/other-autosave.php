<script>
/* Declare. */
var base_url = $('#base_url').val();
/* var content_knowledge = CKEDITOR.instances['content_knowledge'].getData();*/
/** 
var simplemde = new SimpleMDE({
	element: document.getElementById("content_knowledge"),
	spellChecker: false,
	autosave: {
		enabled: false,
		unique_id: "content_knowledge",
	},
});
*/

/* Auto Save Handler */
$( ".form-control" ).keyup(function() {
	$('#autosave-status').html('<span class="label label-info"><i class="fa fa-pencil fa-fw"></i> writing</span>');
});

$(".CodeMirror").on('keyup', function(){
  	$('#autosave-status').html('<span class="label label-info"><i class="fa fa-pencil fa-fw"></i> writing</span>');
});  

$( ".form-control" ).focusout(function() {
	$('#autosave-status').html('<span class="label label-info"><i class="fa fa-save fa-fw"></i> autosave / 30 seconds</span>');
});

setInterval(function(){ 
	save();
}, 30000); /* dinamis */

/* Button save handler */

$( "#save" ).click(function(){
	save();
});

CKEDITOR.replace( 'content_knowledge' );

function save(){
	var id_knowledge = $('#id_knowledge').val();
	var code_knowledge = $('#code_knowledge').val();
	var title_knowledge = $('#title_knowledge').val();
	var slug_knowledge = $('#slug_knowledge').val();
	var id_category = $('#id_category').val();
	var tags_knowledge = $('#tags_knowledge').val();
	var link_knowledge = $('#link_knowledge').val();
	var type_knowledge = $('#type_knowledge').val();
	var name_knowledge = $('#name_knowledge').val();
	var content_knowledge = CKEDITOR.instances['content_knowledge'].getData();

	console.log(link_knowledge);
	/*
	var render = simplemde.value();
	var content_knowledge = simplemde.options.previewRender(render);
	*/
	//var content_knowledge = html(renderedHTML);

	$('#autosave-status').html('<span class="label label-info"><i class="fa fa-save fa-fw"></i> saving..</span>');

	$( ".btn-save" ).prop("disabled", true);

    $.ajax( {
		url: "<?php echo base_url();?>su_knowledge/autosave",
		type: "POST",
		data: "id_knowledge=" + id_knowledge + 
			  "&code_knowledge=" + code_knowledge + 
			  "&title_knowledge=" + title_knowledge + 
			  "&slug_knowledge=" + slug_knowledge + 
			  "&id_category=" + id_category + 
			  "&content_knowledge=" + content_knowledge +
			  "&tags_knowledge=" + tags_knowledge +
			  "&link_knowledge=" + link_knowledge +
			  "&name_knowledge=" + name_knowledge +
			  "&type_knowledge=" + type_knowledge,
		cache: false,
        success: function(data){
            $('#autosave-status').html('<span class="label label-success"><i class="fa fa-check fa-fw"></i> saved</span>');
			//console.log(id_knowledge);

			/* PNotify Desktop */
			PNotify.desktop.permission();
			(new PNotify({
				title: 'Saved!',
				text: 'Hooray, knowledge was saved successfully!',
				type: 'success',
				desktop: {
					desktop: true
				}
			})).get().click(function(e) {
				if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
				alert('Hey! You clicked the desktop notification!');
			});

			$( ".btn-save" ).prop("disabled", false);
        },
        error: function(xhr, type, error) { 
            $('#autosave-status').html('<span class="label label-danger"><i class="fa fa-bug fa-fw"></i> adakesalahan teknis, tidak dapat menyimpan</span>'); 
        }
	});
}
</script>