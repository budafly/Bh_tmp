<?php
/**
 * Bloodhound Library
 * @package Bloodhound
 */

/**
 * Home Splash Classes and Styles
 * @param  array  $my_classes Additional classes to insert, i.e. ('one-class', 'other-class')
 * @param  array  $my_styles  Additional styles to insert, i.e. ('display:block;', 'margin-bottom:20px;' )
 * @return echo               Will echo classes and styles to element
 */
function vg_splash_classes_and_styles( $my_classes = array(), $my_styles = array() ) {
	vg_splash_classes( $my_classes );
	vg_splash_styles( $my_styles );
}

/**
 * Home Splash Classes
 * @param  array  $my_classes Additional classes to insert, i.e. ('one-class', 'other-class')
 * @return echo               Will echo classes to element
 */
function vg_splash_classes( $my_classes = array() ) {
	$splash = get_option( 'vg_splash' );	
	$classes = 'class="';

	if( $my_classes && is_array( $my_classes ) )
		$classes .= ''.implode( ' ', $my_classes ).'';

	if( $splash['cover-screen'] )
		$classes .= ' cover-screen';

	$classes .= '"';

	echo $classes;
}

/**
 * Home Splash Styles
 * @param  array  $my_styles Additional styles to insert, i.e. ('display:block;', 'margin-bottom:20px;' )
 * @return echo              Will echo styles to element
 */
function vg_splash_styles( $my_styles = array() ) {
	$splash = get_option( 'vg_splash' );
	$styles = 'style="';

	switch( $splash['bg'] ) {
		case 'color' :
			$styles .= 'background: '.$splash['color'].';';
		break;

		case 'pattern' :
			$styles .= 'background: url('.$splash['pattern'].') repeat scroll top left;';
		break;

		case 'image' :
			$styles .= 'background: url('.$splash['image']['image'].') '.$splash['image']['repeat'].' '.$splash['image']['attach'].' '.$splash['image']['position-x'].' '.$splash['image']['position-x'].' '.$splash['image']['cover'].';';
		break;

		case 'gradient' :
			$styles .= vg_get_gradient_bg();
		break;
	}

	if( $my_styles && is_array( $my_styles ) )
		$styles .= implode( ' ', $my_styles ).'';

	$styles .= '"';

	echo $styles;
}

function vg_get_gradient_bg() {
	$splash = get_option( 'vg_splash' );

	$style = false;
	if( 'radial' == $splash['gradient']['gradient-dir'] ){
		$style .= "
			background-color: ".$splash['gradient']['gradient-start'].";
			background: -webkit-gradient(radial, center center, 0, center center, 460, from(".$splash['gradient']['gradient-start']."), to(".$splash['gradient']['gradient-finish']."));
			background: -webkit-radial-gradient(circle, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
			background: -moz-radial-gradient(circle, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
			background: -ms-radial-gradient(circle, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");";
	}
	else{
		if( 'ttb' == $splash['gradient']['gradient-linear-dir'] ){
			$style .= "
				background-color: ".$splash['gradient']['gradient-start'].";
				background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(".$splash['gradient']['gradient-start']."), to(".$splash['gradient']['gradient-finish']."));
				background: -webkit-linear-gradient(top, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -moz-linear-gradient(top, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -ms-linear-gradient(top, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -o-linear-gradient(top, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");";
		}
		else{
			$style .= "
				background-color: ".$splash['gradient']['gradient-start'].";
				background: -webkit-gradient(linear, left top, right top, from(".$splash['gradient']['gradient-start']."), to(".$splash['gradient']['gradient-finish']."));
				background: -webkit-linear-gradient(left, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -moz-linear-gradient(left, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -ms-linear-gradient(left, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");
				background: -o-linear-gradient(left, ".$splash['gradient']['gradient-start'].", ".$splash['gradient']['gradient-finish'].");";
		}
	}
	return $style;
}

//Team Members Page Functions
function vg_team_member() {
	//display team member avatar
	if(get_option('vg_team_image')) {
		vg_team_avatar();	
	}
		
	vg_team_name();
	
	if(get_option('vg_team_phone')) :
		?>
		<div class="block vg-team-phone center">
			<span class="vg-team-meta"><?php echo get_option('vg_team_phone'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('vg_team_email')) :
		?>
		<div class="block vg-team-email center">
			<span class="vg-team-meta"><?php echo get_option('vg_team_email'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('vg_team_social')) :
		?>
		<div class="block vg-team-social center">
			<span class="vg-team-meta"><?php echo get_option('vg_team_social'); ?></span>
		</div>
		<?php
	endif;
	
	if(get_option('vg_team_desc')) :
		?>
		<div class="block vg-team-desc center">
			<span class="vg-team-meta"><?php echo get_option('vg_team_desc'); ?></span>
		</div>
		<?php
	endif;
}

//display team member avatar
function vg_team_avatar() {
	if ( get_option('vg_team_link') ) {
		?>
			<div class="block vg-team-image center">
				<a href="<?php the_permalink(); ?>" class="block">
					<img src="<?php echo get_option('vg_team_image'); ?>" class="responsive <?php echo get_option('vg_image_round'); ?>">
				</a>
			</div>
		<?php
	}
	else{
		?>
			<div class="block vg-team-image center">
				<img src="<?php echo get_option('vg_team_image'); ?>" class="responsive <?php echo get_option('vg_image_round'); ?>">
			</div>
		<?php
	}
}

//display team member name
function vg_team_name() {
	if ( get_option('vg_team_link') ) {
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

//===========================

function vg_get_header_layout() {
	$layout = get_option('vg_header_layout');
	
	switch( $layout ) {
		
		case '3-6-3' : 
			$span = array('span3', 'span6', 'span3');
		break;
		
		case '4-4-4' : 
			$span = array('span4', 'span4', 'span4');
		break;
		
		case '6-6' :
			$span = array('span6', 'span6');
		break;
		
		case '3-9' :
			$span = array('span3', 'span9');
		break;
	}
	return $span;
}

function vg_header_class() {
	//get mobile nav options
	$header = get_option( 'vg_header' );
	if( $header['sticky'] ){
		$sticky = 'sticky';
	}
	else{
		$sticky = '';
	}
	echo $sticky;
}

//vg background composer

function vg_header_style( $s="" ) {
	//get main header styles
	$header = get_option('vg_header');
	$header_border = get_option('vg_header_border');

	$style = 'style="';

	if($header['sticky'] && '1' == $header['sticky']){
		$position = 'position:fixed;top:0;left:0;width:100%;z-index:99;';
		$style .= $position;
	}

	if($header_border) {
		$style .= "border-bottom:".$header_border['px']." ".$header_border['style']." ".$header_border['color'].";";
	}
	
	//color, gradient, pattern, or image
	switch ( $header['bg'] ) {
		case 'color':
			$style .= 'background:'.get_option( 'vg_header_bgcolor' ).';';
			break;
		
		case 'gradient':
			$style .= "";
			break;

		case 'pattern':
			$style .= "background: url(".get_option( 'vg_header_pattern' ).") repeat scroll top left transparent;";
			break;

		case 'image':
			$image = get_option( 'vg_header_image' );
			$style .= "background: url( ".$image['image']." ) ".$image['repeat']." ".$image['attach']." ".$image['position-x']." ".$image['position-y']." transparent;";
			break;

		default:
			$style .= 'background:'.get_option( 'vg_header_bgcolor' ).';';
			break;
	}
	
	$style .= ''.$s.'"';
	
	echo $style;
}

function vg_output_css( ) {
	$gradient = get_option('vg_header_gradient');

	$style = "<style>
		#header {";
	if('radial' == $gradient['dir']){
		$style .= "
			background-color: ".$gradient['start'].";
			background: -webkit-gradient(radial, center center, 0, center center, 460, from(".$gradient['start']."), to(".$gradient['finish']."));
			background: -webkit-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");
			background: -moz-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");
			background: -ms-radial-gradient(circle, ".$gradient['start'].", ".$gradient['finish'].");";
	}
	else{
		if('linear' == $gradient){
			if('ttb' == $gradient['linear']){
				$style .= "
					background-color: ".$gradient['start'].";
					background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(".$gradient['start']."), to(".$gradient['finish']."));
					background: -webkit-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -moz-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -ms-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");
					background: -o-linear-gradient(top, ".$gradient['start'].", ".$gradient['finish'].");";
			}
			else{
				$style .= "
					background-color: ".$gradient['start'].";
					background: -webkit-gradient(linear, left top, right top, from(".$gradient['start']."), to(".$gradient['finish']."));
					background: -webkit-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -moz-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -ms-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");
					background: -o-linear-gradient(left, ".$gradient['start'].", ".$gradient['finish'].");";
			}
		}
	}
	
	$style .= "}
		</style>";
	echo $style;
}

//===========================

/**
 * Main Nav
 * @param  integer $depth depth for wordpress child nav (sub menu levels)
 * @param  string  $nav   tells the function which nav to load. e.g. 'splash'
 * @return echo         echo the main nav
 */
function vg_do_nav( $depth = 2, $nav = '' ) {
	//get mobile nav options
	$header = get_option( 'vg_header' );
	
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
		'walker'		  => new vgOnePageNav( $nav ),
	);
	echo "<div class='block'>"; ?>
	<a href="javascript:;" onclick="vgToggleNav(this)" class="nav-toggle btn" id="nav-toggle" style="background:<?php echo $header['nav-toggle-bg']; ?>;color:<?php echo $header['nav-toggle-color']; ?>;"><i class="fa fa-fw fa-bars"></i></a>
	<?php wp_nav_menu( $args );
	echo "</div>";
}
?>