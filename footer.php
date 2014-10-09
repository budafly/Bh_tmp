<section id="footer">

	<div class="container">
		<div class="row">
		
			<div class="col3 footer-a footer">
				<?php dynamic_sidebar('vg-footer-a'); ?>
			</div>
			
			<div class="col3 footer-b footer">
				<?php dynamic_sidebar('vg-footer-b'); ?>
			</div>
			
			<div class="col3 footer-c footer">
				<?php dynamic_sidebar('vg-footer-c'); ?>
			</div>
		
		</div>
	</div>
</section>
<div class="copyright">
	<div class="container row">
		<span class="float-left">&copy; Copyright <?php echo date('Y'); ?>, Medriguez</span>
		<span class="float-right">Developed by <a href="http://vallgroup.com" target="_blank">Vallgroup LLC</a></span>
	</div>
</div>

<?php wp_footer(); ?>