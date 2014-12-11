jQuery(function($) { //on document ready

	//theme options page tabs
	$(document).on( 'click', '.theme-tabs .theme-tab a', function(){
		var a = $( event.target ).attr( 'href' )
		$('.theme-tabs .theme-tab').removeClass( 'active' )
		$( event.target ).parent().addClass( 'active' )
		$('.theme-tab-content').fadeOut( 'fast' )
		$( a ).fadeIn( 'fast' )
		return false
	} )

	$(window).load(function(){

	})

	//set up minicolors
	$('.field .color input[type="text"], input.color-field').minicolors();
	
	//vg theme options nav
	$('.bloodhound-nav a').click(function() {
		$('.bloodhound-nav li').removeClass('active');
		$(this).parent('li').addClass('active');
		
		var u = $(this).attr('href');
		
		$('.bloodhound-tab').fadeOut();
		$(u).fadeIn();
		
		return false;
	});
	
	$('.field .toggle').on('change', function(){
		if($(this).is('select')){
			var a = $(this).find('option:selected'),
				b = a.attr('data-toggle');
			
			$('.bloodhound-form-toggle').hide('slow');		
			$(b).show('slow');
		}
		
	});
	
	//display grid view options on team page
	$('#bloodhound-team-layout').on('change', function(){
		var a = $(this).val();
		
		if( 'grid-view' == a){
			$('.bloodhound-grid-options').show('slow');
		}
		else{
			$('.bloodhound-grid-options').hide('slow');
		}
	});
	
	if( 'grid-view' == $('#bloodhound-team-layout').val() ){
		$('.bloodhound-grid-options').show('slow');
	}
	else{
		$('.bloodhound-grid-options').hide('slow');
	}
	
	//display vg team member display option
	$('#bloodhound-team-level').on('change', function(){
		var a = $(this).val();
		
		if('category' == a){
			$('.bloodhound-team-display-members').show('slow');
		}
		else{
			$('.bloodhound-team-display-members').hide('slow');
		}		
	});
	
	if('category' == $('#bloodhound-team-level').val()){
		$('.bloodhound-team-display-members').show('slow');
	}
	else{
		$('.bloodhound-team-display-members').hide('slow');
	}
	
	//display bloodhound-team-photo options
	$('#bloodhound-team-photo').click(function(){
		$('.bloodhound-team-avatar').slideToggle('slow');
	});
	
	if($('#bloodhound-team-photo').attr('checked')){
		$('.bloodhound-team-avatar').show('slow');
	}
	else{
		$('.bloodhound-team-avatar').hide('slow');
	}

	$('.field .fa-icon .premise-choose-icon').click(function(){
		$(this).siblings('.fa-all-icons').show('fast');
		$('.this-icon').parent('li').show();
	})

	$('.field .fa-icon .premise-remove-icon').click(function(){
		$(this).siblings('.fa-all-icons').hide('fast');
		$('.this-icon').parent('li').show();
		$(this).parents('.fa-icon').find('input.premise-insert-icon').val('')
	})

	$('.field .fa-icon .fa-all-icons a.this-icon').click(function(){
		var a = $(this).attr('data-icon');
		$(this).parents('.fa-icon').find('input.premise-insert-icon').val(a)
		$('.fa-all-icons').hide('fast')
	})

	$('.field .fa-icon').on('keyup', '.premise-insert-icon', function(){
		var a = $(this).val().toLowerCase();

		if( '' !== a ){
			$(this).siblings('.fa-all-icons').show('fast')
			premiseFilterIcons(a);
		}
		else{
			$(this).siblings('.fa-all-icons').hide('fast')
		}
		$('.this-icon').click(function(){
			$('.fa-all-icons').hide('fast')
		})
	})



	
});

/**
 * add post
 * @param  {[type]} obj [description]
 * @return {[type]}     [description]
 */
function bloodhoundAddToOPN() {
	var c = jQuery('#bloodhound_add_post-checkbox'), s = jQuery('span.ajax-response'), data;
	var bloodhound_post_title     = jQuery( '#bloodhound_post_title' ).val()
	var bloodhound_post_url       = jQuery( '#bloodhound_post_url' ).val()
	var bloodhound_post_object_id = jQuery( '#bloodhound_post_object_id' ).val()
	var bloodhound_post_object    = jQuery( '#bloodhound_post_object' ).val()
	if( c.prop('checked') ){
		data = {
			'action': 'bloodhound_update_this_post',
			'bloodhound_add_post_to_one_page': '1',
			'bloodhound_post_title': bloodhound_post_title,
			'bloodhound_post_url': bloodhound_post_url,
			'bloodhound_post_object_id': bloodhound_post_object_id,
			'bloodhound_post_object': bloodhound_post_object
		}
	}
	else{
		data = {
			'action': 'bloodhound_update_this_post',
			'bloodhound_add_post_to_one_page': '0',
			'bloodhound_post_object_id': bloodhound_post_object_id,
			'bloodhound_post_object': bloodhound_post_object
		}
	}
	s.html( '<i class="fa fa-fw fa-spin fa-futbol"></i>' )
	jQuery.post(ajaxurl, data, function( response ) {
		response = jQuery.parseJSON(response)
		s.html(response.message)
	})
}




function bloodhoundUpdateTheme(){
event.preventDefault();

console.log( ajaxurl )

jQuery.post(
    // see tip #1 for how we declare global javascript variables
    ajaxurl,
    {
        // here we declare the parameters to send along with the request
        // this means the following action hooks will be fired:
        // wp_ajax_nopriv_myajax-submit and wp_ajax_myajax-submit
        action : 'bloodhound_update_options',
 
        // other parameters can be added along with "action"
        postID : 'postID'
    },
    function( response ) {
        alert( response );
    }
);

}


