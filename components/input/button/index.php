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

	$base_class = 'input-button input-button--primary input-button--small';

	$type_class = "primary, secondary, tertiary, text, icon"; 
?>
<a href="#" class="<?php echo $base_class; ?>">
<!-- <button type="submit"> -->
	<?php $CL->load( 'util/icon', array( 'name' => '3d-arc-center-pt' ) ); ?> Text <?php $CL->load( 'util/icon', array( 'name' => '3d-arc-center-pt' ) ); ?>
</a>
<!-- </button> -->