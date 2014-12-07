<?php
/**
 * Bloodhound Library
 * @package Bloodhound
 */

function bloodhound_get_page_options() {
	global $post;
	return $page = get_post_meta( $post->ID, 'bloodhound_add_post', true );
}

function bloodhound_the_page_styles( $style = array() ) {
	if( !is_array( $style ) )
		return false;
	$_styles = bloodhound_get_page_options();
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
	$html .= implode( '', $style ).'"';
	echo $html;
}

/**
 * Home Splash Classes and Styles
 * @param  array  $my_classes Additional classes to insert, i.e. ('one-class', 'other-class')
 * @param  array  $my_styles  Additional styles to insert, i.e. ('display:block;', 'margin-bottom:20px;' )
 * @return echo               Will echo classes and styles to element
 */
function bloodhound_splash_classes_and_styles( $my_classes = '', $my_styles = '' ) {
	bloodhound_splash_classes( $my_classes );
	bloodhound_splash_styles( $my_styles );
}

/**
 * Home Splash Classes
 * @param  string  $my_classes Additional classes to insert, i.e. ('one-class other-class')
 * @return echo                Will echo classes to element
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

function bloodhound_splash_styles( $my_styles = '' ) {
	$styles = 'style="';

	if( !empty( $my_styles ) )
		$styles .= $my_styles;

	$styles .= premise_the_background( 'bloodhound_splash', false );

	$styles .= '"';

	echo $styles;
}

//Team Members Page Functions
function bloodhound_team_member() {
	//display team member avatar
	if(get_option('bloodhound_team_image')) {
		bloodhound_team_avatar();	
	}
		
	bloodhound_team_name();
	
	if(get_option('bloodhound_team_phone')) :
		?>
		<div class="block vg-team-phone center">
			<span class="vg-team-meta"><?php echo get_option('bloodhound_team_phone'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('bloodhound_team_email')) :
		?>
		<div class="block vg-team-email center">
			<span class="vg-team-meta"><?php echo get_option('bloodhound_team_email'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('bloodhound_team_social')) :
		?>
		<div class="block vg-team-social center">
			<span class="vg-team-meta"><?php echo get_option('bloodhound_team_social'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('bloodhound_team_desc')) :
		?>
		<div class="block vg-team-desc center">
			<span class="vg-team-meta"><?php echo get_option('bloodhound_team_desc'); ?></span>
		</div>
		<?php
	endif;
}

//display team member avatar
function bloodhound_team_avatar() {
	if ( get_option('bloodhound_team_link') ) {
		?>
			<div class="block vg-team-image center">
				<a href="<?php the_permalink(); ?>" class="block">
					<img src="<?php echo get_option('bloodhound_team_image'); ?>" class="responsive <?php echo get_option('bloodhound_image_round'); ?>">
				</a>
			</div>
		<?php
	}
	else{
		?>
			<div class="block vg-team-image center">
				<img src="<?php echo get_option('bloodhound_team_image'); ?>" class="responsive <?php echo get_option('bloodhound_image_round'); ?>">
			</div>
		<?php
	}
}

//display team member name
function bloodhound_team_name() {
	if ( get_option('bloodhound_team_link') ) {
		?>
			<div class="block vg-team-name center">
				<a href="<?php the_permalink(); ?>" class="block">
					<h2><?php the_title(); ?></h2>
				</a>
			</div>
		<?php
	}
	else{
		?>
			<div class="block vg-team-name center">
				<h2><?php the_title(); ?></h2>
			</div>
		<?php
	}
}

function bloodhound_header_classes_and_styles( $my_classes = '', $my_styles = '' ) {
	bloodhound_header_class( $my_classes );
	bloodhound_header_style( $my_styles );
}

function bloodhound_header_class( $my_classes ='' ) {
	$header = get_option( 'bloodhound_header' );
	echo !empty( $header['sticky'] ) ? 'class="sticky '.$my_classes.'"' : 'class="'.$my_classes.'"';
}

function bloodhound_header_style( $my_styles = '' ) {
	echo 'style="'.premise_the_background( 'bloodhound_header', false ) . $my_styles.'"';
}

/**
 * Main Nav
 * @param  integer $depth depth for wordpress child nav (sub menu levels)
 * @param  string  $nav   tells the function which nav to load. e.g. 'splash'
 * @return echo         echo the main nav
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
?>