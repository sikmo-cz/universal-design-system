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

	// Preload any components that this component relies on
	$ComponentLoader->preload( 'forms/helper' );

	$base_class = 'input-text';

?>
<label class="<?php echo $base_class; ?>">
	<span>Label</span>
	<div data-icon-before="">
		<input type="text">
	</div>

	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>
</label>
