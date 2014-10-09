jQuery(function($) { //on document ready
	//set up minicolors
	$('.field .color input[type="text"]').minicolors();
	
	//vg theme options nav
	$('.vg-nav a').click(function() {
		$('.vg-nav li').removeClass('active');
		$(this).parent('li').addClass('active');
		
		var u = $(this).attr('href');
		
		$('.vg-tab').fadeOut();
		$(u).fadeIn();
		
		return false;
	});
	
	//set which fields are empty
	$('.field input').each(function(){
		var a = $(this).val();
		if ('' === a){
			$(this).addClass('empty');
		}
	});
	
	//upload file
	var custom_uploader;
	$('.vg-upload-file').click(function(e) {	
	    e.preventDefault();
	    $('.vg-file-url').removeClass('insert-img');
	    $(this).siblings('.vg-file-url').removeClass('empty');
	    $(this).siblings('.vg-file-url').addClass('insert-img');
	    //If the uploader object has already been created, reopen the dialog
	    if (custom_uploader) {
	        custom_uploader.open();
	        return;
	    }
	    //Extend the wp.media object
	    custom_uploader = wp.media.frames.file_frame = wp.media({
	        title: 'Choose File',
	        button: {
	            text: 'Insert File'
	        },
	        multiple: false
	    });
	    //When a file is selected, grab the URL and set it as the text field's value
	    custom_uploader.on('select', function() {
	        attachment = custom_uploader.state().get('selection').first().toJSON();
	        $('.insert-img').val(attachment.url);
	    });
	    //Open the uploader dialog
	    custom_uploader.open();
	    
	});
	
	//remove File
	$('.vg-remove-file').click(function(e){
		e.preventDefault();
		$(this).siblings('.vg-file-url').val('');
		$(this).siblings('.vg-file-url').addClass('empty');
		return false;
	});
		
	//display grid view options on team page
	$('#vg-team-layout').on('change', function(){
		var a = $(this).val();
		
		if( 'grid-view' == a){
			$('.vg-grid-options').show('slow');
		}
		else{
			$('.vg-grid-options').hide('slow');
		}
	});
	
	if( 'grid-view' == $('#vg-team-layout').val() ){
		$('.vg-grid-options').show('slow');
	}
	else{
		$('.vg-grid-options').hide('slow');
	}
	
	//display vg team member display option
	$('#vg-team-level').on('change', function(){
		var a = $(this).val();
		
		if('category' == a){
			$('.vg-team-display-members').show('slow');
		}
		else{
			$('.vg-team-display-members').hide('slow');
		}		
	});
	
	if('category' == $('#vg-team-level').val()){
		$('.vg-team-display-members').show('slow');
	}
	else{
		$('.vg-team-display-members').hide('slow');
	}
	
	//display vg-team-photo options
	$('#vg-team-photo').click(function(){
		$('.vg-team-avatar').slideToggle('slow');
	});
	
	if($('#vg-team-photo').attr('checked')){
		$('.vg-team-avatar').show('slow');
	}
	else{
		$('.vg-team-avatar').hide('slow');
	}		
	
});