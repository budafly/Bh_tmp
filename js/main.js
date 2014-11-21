
blodhound_init()

/**
 * make header sticky if applicable
 */
function bloodhound_ifHeaderSticky() {
	if( !jQuery('#header').is('.sticky') )
		return false;

	var header = jQuery('#header.sticky'),
		bump = jQuery('.header-bump'),
		o = header.offset().top;

	jQuery(window).scroll(function(){
		var t = jQuery(window).scrollTop();
		
		if( o < t ){
			bump.height( header.height() )
			header.addClass('fixed')
		}
		else{
			bump.height( '' )
			header.removeClass('fixed')
		}
	})

	return true
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
      beforeActivate: function(event, ui) {

      },
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

function bloodhound_customJs() {

	if( bloodhound_ifHeaderSticky() ) {
		jQuery('.menu-item a').on( 'click', function(){
			vgScrollToEl( jQuery(this), jQuery('#header.sticky').height() )
			return false
		})
	}



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

function bloodhound_ready() {
	bloodhound_setHomeSplashHeight()
	bloodhound_fireAccordion()
	//run last
	bloodhound_customJs()
}


//if header is sticky, make it stick
		

/**
 * ========== Functions ==========
 */
var navToggleCount;
function vgToggleNav() {
	var m = jQuery('#header .nav-menu');

	m.slideToggle('fast')
	m.find('a').addClass('close-nav')
}

/**
 * Scroll to element in one page nav
 * @param  {object} el anchor element to be passed in onclick attribute
 * @return {false}    the page will scroll to the element in href attr of anchor element
 */
function vgScrollToEl(el,o) {
	var a = jQuery(el).attr('href')

	jQuery('body').animate({
		scrollTop: jQuery(a).offset().top - o
	}, 800)

	return false;
}

