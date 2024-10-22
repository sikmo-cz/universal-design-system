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

	$base_class = 'steppers-progress';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
<ul class="<?php echo $base_class; ?>">
	<li><a href="#" class="done">1</a></li>
	<li><a href="#" class="done">2</a></li>
	<li><a href="#">3</a></li>
</ul>
