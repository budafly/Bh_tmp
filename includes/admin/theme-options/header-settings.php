<?php //get header settings array
$header = get_option( 'vg_header' ); ?>

<div id="header" class="black">
	
	<h3>Header Settings</h3>

	<div class="field-section">
		<div class="field">
			<p class="label">Make header sticky</p>
			<span class="tooltip">
				<i>If enabled, the header will always stick to the top.</i>
			</span>
			<div class="checkbox">
				<input type="checkbox" name="vg_header[sticky]" id="vg_header-sticky" value="1" <?php checked( $header['sticky'], 1 ); ?>>
				<label for="vg_header-sticky"></label>
			</div>
		</div>
	</div>

	<div class="field-sectioin">		
		<div class="field">
			<label for="vg_logo">Upload Logo</label>
			<div class="file">
				<input type="text" name="vg_logo" id="vg_logo" value="<?php echo get_option( 'vg_logo' ); ?>" class="file-url">
				<a class="btn-upload" href="javascript:void(0);"><i class="fa fa-fw fa-upload"></i></a>
				<a class="btn-remove" href="javascript:void(0);"><i class="fa fa-fw fa-times"></i></a>
			</div>
		</div>
	</div>

	<div class="field-sectioin">		
		<div class="field">
			<label for="vg_header-nav-color">Nav Items Color</label>
			<i>Choose the color for all menu items. This controls all menu items and the icons on the home splash menu if applicable.</i>
			<div class="color">
				<input type="text" name="vg_header[nav-color]" id="vg_header-nav-color" class="premise-color-field" value="<?php echo $header['nav-color']; ?>">
			</div>
		</div>
	</div>

	<div class="field-sectioin">
		
		<h3>Mobile Nav Button</h3>
		<i>Style the mobile nav toggle button.</i>

		<div class="clear"></div>

		<div class="field">
			<label for="vg_header-nav-toggle-bg">Select a background</label>
			<div class="color">
				<input type="text" name="vg_header[nav-toggle-bg]" id="vg_header-nav-toggle-bg" class="premise-color-field" value="<?php echo $header['nav-toggle-bg']; ?>">
			</div>
		</div>


		<div class="field">
			<label for="vg_header-nav-toggle-icon">Select a Nav Icon</label>
			<div class="fa-icon">
				<input type="text" name="vg_header[nav-toggle-icon]" id="vg_header_nav-toggle-icon" class="premise-insert-icon" value="<?php echo $header['nav-toggle-icon']; ?>">
				<a href="javascript:;" class="premise-choose-icon"><i class="fa fa-fw fa-th"></i></a>
				<a href="javascript:;" class="premise-remove-icon"><i class="fa fa-fw fa-times"></i></a>
			</div>
		</div>
		
		<div class="field">
			<label for="vg_header-nav-toggle-color">Nav Icon color</label>
			<div class="color">
				<input type="text" name="vg_header[nav-toggle-color]" id="vg_header-nav-toggle-color" class="premise-color-field" value="<?php echo $header['nav-toggle-color']; ?>">
			</div>
		</div>

		<div class="clear"></div>
	</div>

</div>