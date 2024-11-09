<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$name 	= $data[ 'name' ] ?? 'circle';
	$alt 	= $data[ 'alt' ] ?? '';
	$title 	= $data[ 'title' ] ?? '';
?>
<svg width="24" height="24" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
	<use href="/dist/images/icons-sprite.svg#<?php echo $data[ 'name' ]; ?>">
</svg>