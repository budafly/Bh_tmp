<?php
/**
 * Bloodhound Library
 * 
 * @package Bloodhound
 * @subpackage Library
 */

/**
 * The Page Styles
 *
 * @param  object $post  current post object. 
 * @param  string $style additional styles you can pass  i.e. ('display:block; box-sizing:border-box;')
 * @return string        Output inline styles
 */
function bloodhound_the_page_styles( $post, $style = '' ) {
	$_styles = get_post_meta( $post->ID, 'bloodhound_add_post', true );
	$html = 'style="';
	switch ( $_styles['style'] ) {
		case 'top':
			$html .= 'border-top:20px solid '.$_styles['page-color'].';';
			break;

		case 'solid':
			$html .= 'background:'.$_styles['page-color'].';';
			break;
		
		default:
			$html .= '';
			break;
	}
	echo $html . $style . '"';
}

/**
 * Home Splash Classes and Styles
 * 
 * @param  array  $my_classes Additional classes to insert, i.e. ('one-class', 'other-class')
 * @param  array  $my_styles  Additional styles to insert, i.e. ('display:block;', 'margin-bottom:20px;' )
 * @return string             inline style and class attributes
 *
 * @see bloodhound_splash_classes() & bloodhound_splash_styles()
 */
function bloodhound_splash_classes_and_styles( $my_classes = '', $my_styles = '' ) {
	bloodhound_splash_classes( $my_classes );
	bloodhound_splash_styles( $my_styles );
}

/**
 * Home Splash Classes
 * 
 * @param  string  $my_classes Additional classes to insert, i.e. ('one-class other-class')
 * @return string              inline class attribute
 *
 * @see bloodhound_splash_classes_and_styles()
 */
function bloodhound_splash_classes( $my_classes = '' ) {
	$splash = get_option( 'bloodhound_splash' );	
	$classes = 'class="';

	if( !empty( $my_classes ) )
		$classes .= $my_classes;

	if( $splash['cover-screen'] )
		$classes .= ' cover-screen';

	$classes .= '"';

	echo $classes;
}

/**
 * Home Splash Styles
 * 
 * @param  string $my_styles additional styles i.e. ('display:block; box-sizing:border-box;')
 * @return string            inline style attribute
 *
 * @see bloodhound_splash_classes_and_styles()
 */
function bloodhound_splash_styles( $my_styles = '' ) {
	$styles = 'style="';

	if( !empty( $my_styles ) )
		$styles .= $my_styles;

	$styles .= premise_the_background( 'bloodhound_splash', false );

	$styles .= '"';

	echo $styles;
}

/**
 * Header classes and styles
 * 
 * @param  string $my_classes additional classes i.e. ('one-class other-class')
 * @param  string $my_styles  additional styles  i.e. ('display:block; box-sizing:border-box;')
 * @return string             inline style and class attributes
 *
 * @see bloodhound_header_class() & bloodhound_header_style()
 */
function bloodhound_header_classes_and_styles( $my_classes = '', $my_styles = '' ) {
	bloodhound_header_class( $my_classes );
	bloodhound_header_style( $my_styles );
}

/**
 * Header Classes
 * 
 * @param  string $my_classes additional classes i.e. ('one-class other-class')
 * @return string             inline class attribute
 *
 * @see bloodhound_header_classes_and_styles()
 */
function bloodhound_header_class( $my_classes ='' ) {
	$header = get_option( 'bloodhound_header' );
	echo !empty( $header['sticky'] ) ? 'class="sticky '.$my_classes.'"' : 'class="'.$my_classes.'"';
}

/**
 * header styles
 * 
 * @param  string $my_styles additional styles i.e. ('display:block; box-sizing:border-box;')
 * @return string            inline style attribute
 * 
 * @see bloodhound_header_classes_and_styles()
 */
function bloodhound_header_style( $my_styles = '' ) {
	echo 'style="'.premise_the_background( 'bloodhound_header', false ) . $my_styles.'"';
}

/**
 * Main Nav
 * 
 * @param  integer $depth depth for wordpress child nav (sub menu levels)
 * @param  string  $nav   tells the function which nav to load. e.g. 'splash'
 * @return string         HTML markup for the main nav
 */
function bloodhound_do_nav( $depth = 2, $nav = '' ) {
	//get mobile nav options
	$header = get_option( 'bloodhound_header' );
	
	$args = array(
		'theme_location'  => 'primary',
		'menu'            => 'primary',
		'menu_id' 		  => 'primary-nav',
		'container'       => 'nav',
		'container_class' => 'nav',
		'menu_class'      => 'nav-menu inline',
		'echo'            => true,
		'fallback_cb'     => false,
		'depth'           => $depth,
		'walker'		  => new BloodhoundOnePageNavClass( $nav ),
	);
	echo "<div class='block'>"; ?>
	<a href="javascript:;" onclick="bloodhound_ToggleNav(this)" class="nav-toggle btn" id="nav-toggle" style="background:<?php echo $header['nav-toggle-bg']; ?>;color:<?php echo $header['nav-toggle-color']; ?>;"><i class="fa fa-fw fa-bars"></i></a>
	<?php wp_nav_menu( $args );
	echo "</div>";
}

function bloodhound_grab_menu_items_ids() {
	$locations = get_nav_menu_locations();		
	$menu_id = $locations['primary'];

	$menu = wp_get_nav_menu_items( $menu_id );

	$menu_ids = array();

	foreach ($menu as $menu_item) {
		array_push( $menu_ids, $menu_item->object_id );
	}

	if( $menu_ids )
		return $menu_ids;

	return false;
}


function bloodhound_splash_cta_url() {
	$splash = get_option( 'bloodhound_splash' );
	$p = get_post( $splash['cta-link'] );
	$post_in_onepage = get_post_meta( $p->ID, 'bloodhound_add_post_to_one_page', true );
	
	if( $post_in_onepage ) {		
		$output = '#'.$p->post_name.'" onclick="bloodhound_ScrollToEl(this)';//Leave last double quote out.
	}
	else{
		$output = '/'.$p->post_name;
	}
	echo $output;
}

function bloodhound_the_title( $post, $span = true, $echo = true ) {
	$page = get_post_meta( $post->ID, 'bloodhound_add_post', true );
	
	if( !$page['title-color'] )
		$page['title-color'] = '#333333';
	
	$html = '<div class="post-title">';
	
	if( $span )
		$html .= '<span class="title-bar" style="background:'.$page['title-color'].'"></span>';
	
	$html .= '<h2 style="color:'.$page['title-color'].'">'.get_the_title().'</h2></div>';

	if($echo)
		echo $html;

	return $html;
}

/**
 * Calls the class on the post edit screen.
 * 
 */
function call_Bloodhoundteam_memberClass() {
	new Bloodhoundteam_memberClass();
}
?>