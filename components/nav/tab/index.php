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
 
	$base_class = 'nav-tab';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
	<ul class="<?php echo $base_class; ?>">
		<li><a href="#">Tab 1</a></li>
		<li class="active"><a href="#">Tab 2</a></li>
		<li><a href="#">Tab 3</a></li>
	</ul>
</div>