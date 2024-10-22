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

	$base_class = 'avatars-avatar';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}
	if( isset( $data['big'] ) && $data['size'] == 'big' ) {
		$data['class'] .= "{$base_class}--big";
	}
?>
<a href="#" class="<?php echo $base_class; ?>">
<!-- <div> -->
	HS
	<img src='{$data['image']}' title='{$data['text']}'>
</a>
<!-- </div> -->

