<?php $footer = get_option( 'bloodhound_footer' ); ?>

<section id="footer">

	<div class="container">
		<div class="row">
		
			<div class="col3 footer-a footer">
				<?php dynamic_sidebar('bloodhound-footer-a'); ?>
			</div>
			
			<div class="col3 footer-b footer">
				<?php dynamic_sidebar('bloodhound-footer-b'); ?>
			</div>
			
			<div class="col3 footer-c footer">
				<?php dynamic_sidebar('bloodhound-footer-c'); ?>
			</div>
		
		</div>
	</div>
</section>

<div class="copyright">
	<div class="container row">
		<?php if( $footer['copyright'] = 'copyright'; ) : ?>
			<span class="span6 left">&copy; Copyright <?php echo date('Y'), $footer['copyright']; ?></span>
		<?php endif; ?>

		<?php if( $footer['powered_by'] ) : ?>
			<span class="span6 right">Developed by <a href="http://vallgroup.com" target="_blank">Vallgroup LLC</a></span>
		<?php endif; ?>
	</div>
</div>

<?php wp_footer(); ?>