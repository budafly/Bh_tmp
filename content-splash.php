<?php
	
?>

<section id="home-splash" <?php bloodhound_splash_classes_and_styles(); ?>>
	<div class="container center">

		<?php $splash = get_option( 'bloodhound_splash' ); //Get Splash Home Options ?>
		
		<div class="splash-logo block center">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo $splash['logo'] ? $splash['logo'] : get_option('bloodhound_logo'); ?>" class="inline-block responsive">
			</a>
		</div>

		<div class="home-splash-navigation block center">
			<?php bloodhound_do_nav( 1, 'splash' ); ?>
		</div>

		<?php if( $splash['tag-line'] ) : ?>
			<div class="splash-tag-line block center">
				<?php echo $splash['tag-line']; ?>
			</div>
		<?php endif; ?>

		<?php if( $splash['cta'] ) : ?>
			<div class="splash-cta block center">
				<a href="<?php bloodhound_splash_cta_url(); ?>" class="inline-block btn btn-round btn-splash-cta"><?php echo $splash['cta']; ?></a>
			</div>
		<?php endif; ?>
		
	</div>
</section>