<div id="vg-theme-options-page" class="vg">
	<!-- Start Form -->
	<form method="post" action="options.php" enctype="multipart/form-data">	
			<?php settings_fields( 'vg_theme_options' ); ?>
			<?php do_settings_sections( 'vg_theme_options' ); ?>

		<!-- Head -->
		<div class="row">
			<div class="span3 center vg-logo">
				<a href="htvg://vallgroup.com" target="_blank" class="block">
					<img src="<?php echo get_template_directory_uri(); ?>/admin/img/vg_icon100.png" class="responsive" alt="Vallgroup">
				</a>
			</div>
			<div class="span9 vg-head">
				<div class="span9 vg-title">
					<h1>Theme Options</h1>
				</div>
				<div class="vg-btn-white float-right">
					<?php submit_button(); ?>
				</div>
			</div>
		</div><!-- /Head -->
		
		<!-- Body -->
		<div class="row">
			<!-- Left Column -->
			<div class="span3 vg-left-col">
				<div class="vg-nav">
					<ul>
						<li class="active animate">
							<a href="#vg-general" class="block animate">
								<i class="fa fa-fw fa-lg fa-wrench"></i> <span class="hide-tablet">General</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-header" class="block animate">
								<i class="fa fa-fw fa-lg fa-list-alt"></i> <span class="hide-tablet">Header</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-home" class="block animate">
								<i class="fa fa-fw fa-lg fa-home"></i> <span class="hide-tablet">Home</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-team" class="block animate">
								<i class="fa fa-fw fa-lg fa-group"></i> <span class="hide-tablet">Team Page</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-portfolio" class="block animate">
								<i class="fa fa-fw fa-lg fa-briefcase"></i> <span class="hide-tablet">Portfolio</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-blog" class="block animate">
								<i class="fa fa-fw fa-lg fa-pencil"></i> <span class="hide-tablet">Blog</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-tracking" class="block animate">
								<i class="fa fa-fw fa-lg fa-search"></i> <span class="hide-tablet">Tracking</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-header" class="block animate">
								<i class="fa fa-fw fa-lg fa-th-large"></i> <span class="hide-tablet">Layout</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-footer" class="block animate">
								<i class="fa fa-fw fa-lg fa-gears"></i> <span class="hide-tablet">Advanced</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-design" class="block animate">
								<i class="fa fa-fw fa-lg fa-tint"></i> <span class="hide-tablet">Design</span>
							</a>
						</li>
						<li class="animate">
							<a href="#vg-404" class="block animate">
								<i class="fa fa-fw fa-lg fa-warning"></i> <span class="hide-tablet">404</span>
							</a>
						</li>
					</ul>
				</div>
			</div><!-- /Left Column -->
			<!-- content -->
			<div class="span9 vg-theme-options">

			</div><!-- /Content -->
		</div><!-- /Body -->
		
	</form><!-- /Form -->
</div><!-- /Theme Options Page -->

<?php
//Register Settings
function register_vg_settings () {
	register_setting('vg_theme_options', 'vg_header');
	register_setting('vg_theme_options', 'vg_header_bgcolor');
	register_setting('vg_theme_options', 'vg_header_gradient');
	register_setting('vg_theme_options', 'vg_header_pattern');
	register_setting('vg_theme_options', 'vg_header_image');
	register_setting('vg_theme_options', 'vg_header_border');
}