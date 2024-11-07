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

	$base_class = 'input-toggle';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}


?>
<div class="<?php echo $base_class; ?>">
	Label text
	<div>
		<input type="checkbox">
	</div>
	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>

</div>
