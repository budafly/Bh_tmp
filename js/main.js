
jQuery(function($){
	//force home splash to cover screen height
	setHomeSplashHeight()

	//if header is sticky, make it stick
	if( ifHeaderSticky() ) {
		$('.menu-item a').on( 'click', function(){
			vgScrollToEl( $(this), jQuery('#header.sticky').height() )
			return false
		} )
	}

});

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

/**
 * make header sticky if applicable
 */
function ifHeaderSticky() {
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

function setHomeSplashHeight() {
	var h = jQuery('#home-splash')
	if( h.is('.cover-screen') ){
		jQuery('#home-splash.cover-screen').css( 'min-height', jQuery(window).height() )
		return true
	}
	return false
}