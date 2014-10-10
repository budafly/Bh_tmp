<?php 
//Get Header Layout
$layout = vg_get_header_layout();
$splash = get_option('vg_splash'); ?>

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

<section id="home-splash" class="block relative center">
	<div class="container">
		
		<div class="splash-logo block center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo $splash['logo'] ? $splash['logo'] : get_option('vg_logo'); ?>" class="responsive">
			</a>
		</div>

	</div>
</section>

<header id="header" class="block <?php vg_header_class(); ?>" <?php echo vg_header_style(); ?>>
	<div class="header-inner">
		<div class="container">

			<div class="row">
				<div class="<?php echo $layout[0]; ?> logo center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_option('vg_logo'); ?>" class="responsive">
					</a>
				</div><!-- /logo -->
				
				<div id="main-nav" class="<?php echo $layout[1]; ?>">
					
					<?php vg_do_nav(); ?>
					
				</div><!-- /nav -->
				
				<?php if ($layout[2]) : ?>
				<div class="<?php echo $layout[2]; ?>">
						<div class="block">
							<?php dynamic_sidebar('header-widget'); ?>
						</div>
				</div>
				<?php endif; ?>
			</div>
		
		</div>
	</div>
</header>