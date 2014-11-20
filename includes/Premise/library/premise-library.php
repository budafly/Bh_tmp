<?php
/**
 * Premise Library
 * @package Premise
 * @subpackage Premise Library
 * @link [url] [description]
 */

/**
 * @link [url] [description]
 * @param  array  $args array of arguments to buid a field
 * @return echo         html markup for a form field based on the arguments passed
 * @see class PremiseFormElements in premise-forms-class.php
 */
function premise_field( $args = array() ) {
	if( !is_array( $args ) )
		return false;
	$prem = new PremiseFormElements;
	if( is_array( $args[0] ) ){
		foreach ($args as $arg)
			$prem->the_field( $arg );
	}
	else{
		$prem->the_field( $args );
	}
}

/**
 * Insert Background Fields
 * @param string $name required, the name attribute to assign to each field. Fields are saved in an array
 * @param string $title optional, label output for select dropdown
 * @param string $intro optional, a description for select dropdown
 * @return echo will echo upload fields to insert a background
 */
if ( !function_exists( 'premise_insert_background' ) ) {
	function premise_insert_background( $name, $title = 'Select a Background', $intro = 'You can choose to set a solid color, gradient background, or upload a pattern or an image.' ) { 
		$bg = get_option( $name ); ?>
		<div class="field-section">
			<h3><?php echo $title; ?></h3>
			<span class="tooltip">
				<i><?php echo $intro; ?></i>
			</span>
			<div class="field span6 float-left">
				<label>Choose Background</label>				
				<div class="select">
					<select name="<?php echo $name; ?>[bg]" class="toggle" id="<?php echo $name; ?>-bg">
						<option data-toggle=".<?php echo $name; ?>-color" value="color" <?php if( $bg['bg'] == 'color' ) echo 'selected'; ?>>Solid Background</option>
						<option data-toggle=".<?php echo $name; ?>-gradient" value="gradient" <?php if( $bg['bg'] == 'gradient' ) echo 'selected'; ?>>Gradient Background</option>
						<option data-toggle=".<?php echo $name; ?>-pattern" value="pattern" <?php if( $bg['bg'] == 'pattern' ) echo 'selected'; ?>>Pattern Background</option>
						<option data-toggle=".<?php echo $name; ?>-image" value="image" <?php if( $bg['bg'] == 'image' ) echo 'selected'; ?>>Image Background</option>
					</select>
				</div>
			</div>
			
			<div class="field span6 float-right <?php echo $name; ?>-color vg-form-toggle" <?php if( $bg['bg'] !== 'color' ) echo 'style="display:none;"'; ?>>					
				<div class="field">
					 <label>Select a Color</label>
					<div class="color">
						<input type="text" name="<?php echo $name; ?>[color]" value="<?php echo $bg['color'] ? $bg['color'] : '#ffffff'; ?>">
					</div>
				</div>
			</div>
			
			<div class="field span6 float-right <?php echo $name; ?>-gradient vg-form-toggle" <?php if( $bg['bg'] !== 'gradient' ) echo 'style="display:none;"'; ?>>
				<div class="field">
					<label for="<?php echo $name; ?>-gradient-start">Start Gradient</label>
					<div class="color">
						<input type="text" id="<?php echo $name; ?>-gradient-start" name="<?php echo $name; ?>[gradient][gradient-start]" value="<?php echo $bg['gradient']['gradient-start']; ?>">
					</div>
				</div>
				<div class="field">
					<label for="<?php echo $name; ?>-gradient-finish">Finish Gradient</label>
					<div class="color">
						<input type="text" id="<?php echo $name; ?>-gradient-finish" name="<?php echo $name; ?>[gradient][gradient-finish]" value="<?php echo $bg['gradient']['gradient-finish']; ?>">
					</div>
				</div>
				<div class="field">
					<label>Select Gradient type</label>
					<div class="radio">
						<input type="radio" name="<?php echo $name; ?>[gradient][gradient-dir]" value="linear" id="<?php echo $name; ?>-gradient-linear" <?php checked( $bg['gradient']['gradient-dir'], 'linear' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
						<label for="<?php echo $name; ?>-gradient-linear">Linear</label>
						<input type="radio" name="<?php echo $name; ?>[gradient][gradient-dir]" value="radial" id="<?php echo $name; ?>-gradient-radial" <?php checked( $bg['gradient']['gradient-dir'], 'radial' ); ?> onchange="jQuery('.vg-gradient-direction').slideToggle('slow');">
						<label for="<?php echo $name; ?>-gradient-radial">Radial</label>					
					</div>
				</div>
				<div class="field vg-gradient-direction" <?php if( !$bg['gradient']['gradient-dir'] ) echo 'style="display:none;"'; ?>>
					<div class="radio">
						<input type="radio" name="<?php echo $name; ?>[gradient][gradient-linear-dir]" value="ttb" id="<?php echo $name; ?>-gradient-linear-ttb" <?php checked( $bg['gradient']['gradient-linear-dir'], 'ttb' ); ?>>
						<label for="<?php echo $name; ?>-gradient-linear-ttb">Top to Bottom</label>
						<input type="radio" name="<?php echo $name; ?>[gradient][gradient-linear-dir]" value="ltr" id="<?php echo $name; ?>-gradient-linear-ltr" <?php checked( $bg['gradient']['gradient-linear-dir'], 'ltr' ); ?>>
						<label for="<?php echo $name; ?>-gradient-linear-ltr">left to right</label>
					</div>
				</div>
			</div>
			
			<div class="field span6 float-right <?php echo $name; ?>-pattern vg-form-toggle" <?php if( $bg['bg'] !== 'pattern') echo 'style="display:none;"'; ?>>					
				<div class="field">
					<label>Select a Pattern</label>
					<div class="file">
						<input type="text" placeholder="Upload a pattern" name="<?php echo $name; ?>[pattern]" id="<?php echo $name; ?>-image" value="<?php echo $bg['pattern']; ?>" class="file-url">
						<a class="btn-upload" href="javascript:void(0);"><i class="fa fa-fw fa-upload"></i></a>
						<a class="btn-remove" href="javascript:void(0);"><i class="fa fa-fw fa-times"></i></a>
					</div>
				</div>
				<div class="block">
					<div class="block center">
						<?php if ($bg['pattern']) { ?>
							<p class="label left">Pattern Preview</p>
							<div style="background: url(<?php echo $bg['pattern']; ?>) repeat scroll top left transparent;display:block;height:200px;" class="responsive"></div>
						<?php } ?>
					</div>
				</div>
			</div>				
			<div class="field span6 float-right <?php echo $name; ?>-image vg-form-toggle" <?php if( $bg['bg'] !== 'image') echo 'style="display:none;"'; ?>>					
				<div class="field">
					<label>Select an Image</label>
					<div class="file">
						<input type="text" placeholder="Upload an Image to use as splash background" name="<?php echo $name; ?>[image][image]" id="<?php echo $name; ?>-image" value="<?php echo $bg['image']['image']; ?>" class="file-url">
						<a class="btn-upload" href="javascript:void(0);"><i class="fa fa-fw fa-upload"></i></a>
						<a class="btn-remove" href="javascript:void(0);"><i class="fa fa-fw fa-times"></i></a>
					</div>
				</div>
				<div class="block">
					<div class="block center">
						<?php if ($bg['image']['image']) { ?>
							<p class="label left">Background Preview</p>
							<img src="<?php echo $bg['image']['image']; ?>" class="responsive">
						<?php } ?>
					</div>
				</div>
				
				<div class="field">
					<label for="<?php echo $name; ?>-repeat">Background Reapeat</label>
					<div class="select">
						<select name="<?php echo $name; ?>[image][repeat]" id="<?php echo $name; ?>-repeat">
							<option value="repeat" <?php selected( $bg['image']['repeat'], 'repeat' ); ?>>Reapeat</option>
							<option value="repeat-x" <?php selected( $bg['image']['repeat'], 'repeat-x' ); ?>>Reapeat-X</option>
							<option value="repeat-y" <?php selected( $bg['image']['repeat'], 'repeat-y' ); ?>>Reapeat-Y</option>
							<option value="no-repeat" <?php selected( $bg['image']['repeat'], 'no-repeat' ); ?>>No Repeat</option>
						</select>
					</div>
				</div>
				
				<div class="field">
					<label for="<?php echo $name; ?>-attach">Background Attachment</label>
					<div class="select">
						<select name="<?php echo $name; ?>[image][attach]" id="<?php echo $name; ?>-attach">
							<option value="fixed" <?php selected( $bg['image']['attach'], 'fixed'); ?>>Fixed</option>
							<option value="scroll" <?php selected( $bg['image']['attach'], 'scroll'); ?>>Scroll</option>
						</select>
					</div>
				</div>
				
				<div class="row">	
					<div class="field col3">
						<label for="<?php echo $name; ?>-position-x">Background <br>Position X</label>
						<div class="select">
							<select name="<?php echo $name; ?>[image][position-x]" id="<?php echo $name; ?>-position-x">
								<option value="left" <?php selected( $bg['image']['position-x'], 'left' ); ?>>Left</option>
								<option value="center" <?php selected( $bg['image']['position-x'], 'center' ); ?>>Center</option>
								<option value="right" <?php selected( $bg['image']['position-x'], 'right' ); ?>>Right</option>
							</select>
						</div>
					</div>
					<div class="field col3">
						<label for="<?php echo $name; ?>-position-y">Background <br>Position Y</label>
						<div class="select">
							<select name="<?php echo $name; ?>[image][position-y]" id="<?php echo $name; ?>-position-y">
								<option value="top" <?php selected( $bg['image']['position-y'], 'top' ); ?>>Top</option>
								<option value="center" <?php selected( $bg['image']['position-y'], 'center' ); ?>>Center</option>
								<option value="bottom" <?php selected( $bg['image']['position-y'], 'bottom' ); ?>>Bottom</option>
							</select>
						</div>
					</div>
					<div class="field col3">
						<label for="<?php echo $name; ?>-cover">Background <br>Size</label>
						<div class="select">
							<select name="<?php echo $name; ?>[image][cover]" id="<?php echo $name; ?>-cover">
								<option value="" <?php selected( $bg['image']['cover'], '' ); ?>>Normal</option>
								<option value="/ cover" <?php selected( $bg['image']['cover'], '/ cover' ); ?>>Cover</option>							
							</select>
						</div>
					</div>
				</div>	
			</div>
			<div class="clear"></div>
		</div><?php
	}
}
?>