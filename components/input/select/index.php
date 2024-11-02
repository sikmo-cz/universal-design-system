<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );


	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'forms-select';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

	if( !isset( $data['type'] ) && empty( data['type'] ) ) {
		$data['type'] = "text";
	}


?>
<label class="<?php echo $base_class; ?>">
	Label
	<div>
		<select>
			<?php for ($i=0; $i < 4; $i++) { ?> 
				<option>Option</option>
			<?php } ?>
		</select>
	</div>

	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>
</label>
