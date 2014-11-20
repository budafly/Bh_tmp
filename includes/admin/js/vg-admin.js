jQuery(function($) { //on document ready

	$(window).load(function(){

	})

	//set up minicolors
	$('.field .color input[type="text"], input.color-field').minicolors();
	
	//vg theme options nav
	$('.vg-nav a').click(function() {
		$('.vg-nav li').removeClass('active');
		$(this).parent('li').addClass('active');
		
		var u = $(this).attr('href');
		
		$('.vg-tab').fadeOut();
		$(u).fadeIn();
		
		return false;
	});
	
	$('.field .toggle').on('change', function(){
		if($(this).is('select')){
			var a = $(this).find('option:selected'),
				b = a.attr('data-toggle');
			
			$('.vg-form-toggle').hide('slow');		
			$(b).show('slow');
		}
		
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

