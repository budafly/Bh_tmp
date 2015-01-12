var Bloodhound = {

	header: null,
	bump: null,
	o: '',
	t: ''

};






blodhound_init()

/**
 * make header sticky if applicable
 */
function bloodhound_ifHeaderSticky() {
	if( !jQuery('#header').is('.sticky') )
		return false;

	Bloodhound.header = jQuery('#header.sticky');
	Bloodhound.bump = jQuery('.header-bump')
	
	Bloodhound.o = Bloodhound.header.offset().top;
	
	bloodhound_makeHeaderSticky()

	jQuery(window).scroll(function() {
		
		bloodhound_makeHeaderSticky()

	} )

	return true
}

function bloodhound_makeHeaderSticky() {

	Bloodhound.t = jQuery(window).scrollTop();

	if( Bloodhound.o < Bloodhound.t ){
		Bloodhound.bump.css( 'min-height', Bloodhound.header.height() )
		Bloodhound.header.addClass('premise-fixed')
	}
	else{
		Bloodhound.bump.css( 'min-height', '' )
		Bloodhound.header.removeClass('premise-fixed')
	}
}

/**
 * Sets height for home splash
 */
function bloodhound_setHomeSplashHeight() {
	var h = jQuery('#home-splash')
	if( h.is('.cover-screen') ){
		jQuery('#home-splash.cover-screen').css( 'min-height', jQuery(window).height() )
		return true
	}
	return false
}

/**
 * initiates accordion jquery ui
 */
function bloodhound_fireAccordion(){
	jQuery( ".bloodhound-accordion" ).accordion({
      collapsible: true,
      autoHeight: false,
      animate: 400, 
      active: false,
      icons: { "header": "bloodhound-display-none", "activeHeader": "bloodhound-display-none" },
      heightStyle: "fill",
      activate: function(event, ui) {
      	if( jQuery(".ui-accordion-header").hasClass('ui-state-active') ){
      		jQuery('.bloodhound-our-team-title').fadeOut('fast')
      	}
      	else{
      		jQuery('.bloodhound-our-team-title').fadeIn('fast')
      	}
      }
    })
}

/**
 * Process any additional JS
 */
function bloodhound_customJs() {

	// additional custom JS here
	jQuery('.bxslider').bxSlider({
		pager: false
	});

	// Set projects excerpt same height
	premiseSameHeight('.bloodhound-project-excerpt');

	console.log( 'Bloodhound custom JS: Successful' )
}

/**
 * Initiate our theme
 */
function blodhound_init(){
	jQuery(function(){
		bloodhound_ready()
		console.log( 'Bloodhound Theme JS: Successful' )
	})
}

/**
 * Run Bloodhound
 */
function bloodhound_ready() {
	bloodhound_setHomeSplashHeight()
	bloodhound_fireAccordion()
	bloodhound_ifHeaderSticky()

	//run last
	bloodhound_customJs()
}


/**
 * Nav toggle
 */
var navToggleCount;
function bloodhound_ToggleNav() {
	var m = jQuery('#header .nav-menu')

	m.slideToggle('fast')
	m.find('a').addClass('close-nav')
}

/**
 * Scroll to element in one page nav
 * 
 * @param  {object} el anchor element to be passed in onclick attribute
 * @return {false}    the page will scroll to the element in href attr of anchor element
 */
function bloodhound_ScrollToEl(el,o) {
	event.preventDefault();
	el = typeof el === 'object' ? jQuery(el) : '#primary-nav a'
	o = jQuery('#header.sticky').height()
	
	var a = el.attr('href')
	a = a.substr( a.indexOf('#') )

	jQuery('body').animate({
		scrollTop: jQuery(a).offset().top - o
	}, 800)

	return false;
}



function bloodhoundProjectPopup(el) {
	event.preventDefault();

	el = 'object' === typeof el ? jQuery(el) : null

	var url  = el.attr('href'),
	icon     = jQuery('#bloodhound-ajax-loading'),
	overlay  = jQuery('#bloodhound-ajax-overlay'),
	dialog   = jQuery('#bloodhound-ajax-dialog'),
	close    = jQuery('#bloodhound-ajax-close');

	overlay.fadeIn( 'fast' )
	icon.fadeIn( 'fast' )
	close.fadeIn( 'fast' )

	url     = url + ' #content';

	dialog.load( url, function( resp ) {
		dialog.fadeIn('fast')
		icon.fadeOut( 'fast' )
	})


		

}



/**
 * Close Ajax dialog and empty it.
 * 	
 * @return {bool} false. This function does not return anything
 */
function bloodhoundAjaxClose() {
	var icon = jQuery('#bloodhound-ajax-loading'),
	overlay  = jQuery('#bloodhound-ajax-overlay'),
	dialog   = jQuery('#bloodhound-ajax-dialog'),
	close    = jQuery('#bloodhound-ajax-close');

	icon.fadeOut(    ' fast' )
	overlay.fadeOut( ' fast' )
	dialog.fadeOut(  ' fast' )
	close.fadeOut(   ' fast' )

	dialog.empty()

	return false
}

