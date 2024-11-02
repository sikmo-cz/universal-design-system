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

	$base_class = 'nav-button-group nav-button-group--small';
?>
<ul class="<?php echo $base_class; ?>">
	<li><a href="#">Edit</a></li>
	<li><a href="#">Effects</a></li>
	<li class="active"><a href="#">Format</a></li>
	<li><a href="#">Image</a></li>
</ul>