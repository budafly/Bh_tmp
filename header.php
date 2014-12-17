<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>		
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class('site'); ?>>

<?php if ( ( is_home() || is_front_page() ) && get_option( 'bloodhound_enable_one_page' ) ) {
	get_template_part( 'content', 'splash' );
} ?>

<header id="header" <?php bloodhound_header_classes_and_styles( 'block' ); ?>>
	<div class="header-inner">
		<div class="container">

			<div class="inline">
				<div class="span4 logo left">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_option('bloodhound_logo'); ?>" class="responsive">
					</a>
				</div><!-- /logo -->

				<div class="span8 main-nav right">
					
					<?php bloodhound_do_nav(); ?>
					
				</div><!-- /nav -->
			</div>
		
		</div>
	</div>
</header>
<div class="header-bump"></div>

<section id="content">