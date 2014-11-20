<?php 
//Get Header Layout

$layout = vg_get_header_layout();
$splash = get_option( 'vg_splash' );
$splash_image = get_option( 'vg_splash_image' );
$splash_gradient = get_option( 'vg_splash_gradient' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>		
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php 
		vg_output_css();
		wp_head(); 
	?>
</head>

<body <?php body_class('site'); ?>>

<section id="home-splash" <?php vg_splash_classes_and_styles(); ?>>
	<div class="container center">

		<div class="splash-logo block center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo $splash['logo'] ? $splash['logo'] : get_option('vg_logo'); ?>" class="inline-block responsive">
			</a>
		</div>

		<div class="home-splash-navigation block center">
			<?php vg_do_nav( 1, 'splash' ); ?>
		</div>

		<div class="splash-tag-line block center">
			<?php echo $splash['tag-line']; ?>
		</div>

		<div class="splash-cta block center">
			<a href="<?php vg_splash_cta_url(); ?>" class="inline-block btn btn-round btn-splash-cta"><?php echo $splash['cta']; ?></a>
		</div>
		
	</div>
</section>

<header id="header" class="block <?php vg_header_class(); ?>">
	<div class="header-inner">
		<div class="container">

			<div class="inline">
				<div class="span4 logo left">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_option('vg_logo'); ?>" class="responsive">
					</a>
				</div><!-- /logo -->
				
				<div class="span8 main-nav right">
					
					<?php vg_do_nav(); ?>
					
				</div><!-- /nav -->
			</div>
		
		</div>
	</div>
</header>
<div class="header-bump"></div>