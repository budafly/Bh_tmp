<div id="vg-theme-options-page" class="vg">

	<h1 class="center">Bloodhound Settings</h1>

	<!-- Start Form -->
	<form method="post" action="options.php" enctype="multipart/form-data">	
		<?php settings_fields( 'vg_theme_options' ); ?>
		<?php do_settings_sections( 'vg_theme_options' ); ?>

		<div class="block">
			
			<div class="span3 theme-options-nav float-left same-height inline-block border-box">
				<div class="block theme-logo">
					
				</div>

				<div class="block theme-tabs">
					<span class="theme-tab"><a href="#home">Home</a></span>
					<span class="theme-tab"><a href="#home-splash">Home Splash</a></span>
				</div>
			</div>

			<div class="span9 theme-options-content float-left same-height inline-block border-box relative">
				<!-- Submit button -->
				<div class="vg-btn float-right">
					<?php submit_button(); ?>
				</div>

				<div class="clear"></div>

				<?php 
					include_once( 'home-settings.php' ); 
					include_once( 'home-splash.php' );
					include_once( 'header-settings.php' );
				?>
			</div>

		</div>

		<div class="clear"></div>

		<?php submit_button(); ?>
	</form><!-- /Form -->		
</div><!-- /Theme Options Page -->