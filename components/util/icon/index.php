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
	$width = $data[ 'width' ] ?? 24;
?>
<svg width="<?php echo esc_attr($width) ?>" height="<?php echo esc_attr($width) ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>">
	<use href="<?php echo $ComponentLoader->get_design_system_folder_uri() ?>/dist/images/icons-sprite-symbols.svg#<?php echo $data[ 'name' ]; ?>">
</svg>