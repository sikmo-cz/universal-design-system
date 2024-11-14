<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$name 	= $data[ 'name' ] ?? 'cz';
	$alt 	= $data[ 'alt' ] ?? '';
	$title 	= $data[ 'title' ] ?? '';
?>
<svg width="24" height="17" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
	<use href="<?php echo $ComponentLoader->get_design_system_folder_uri() ?>/dist/images/flags-sprite.svg#<?php echo $data[ 'name' ]; ?>">
</svg>