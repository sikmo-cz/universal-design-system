<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	$ComponentLoader->preload( 'forms/helper' );


	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'forms-multi-select';
?>
<label class="<?php echo $base_class; ?>">
	Label
	<div>
		<select multiple >
			<?php for ($i=0; $i < 4; $i++) { ?> 
				<option>Option</option>
			<?php } ?>
		</select>
	</div>

	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>
</label>
