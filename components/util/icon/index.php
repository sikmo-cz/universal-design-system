<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	// Default values
	$defaults = array(
		'class'         => '',
		'id'            => '',
		'attributes'    => array(),
		'size'          => '',
		'name'          => 'circle',
		'alt'           => '',
		'title'         => '',
		'width'         => 24,
	);

	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = '';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

	// Id
	if (!empty($data["id"])) $attributes["id"] = strval( $data["id"] );

	// Width
	$attributes["width"] = strval($data["width"]);
	$attributes["height"] = strval($data["width"]);

	// Alt
	$attributes["alt"] = $data["alt"];

	// Title
	$attributes["title"] = $data["title"];

	// Attributes
	if ( is_array( $data[ 'attributes' ] ) ) {
		$attributes = array_merge( $attributes, $data[ 'attributes' ] );
	}
?>
<svg <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<use href="<?php echo $ComponentLoader->get_design_system_folder_uri() ?>/dist/images/icons-sprite-symbols.svg#<?php echo $data[ 'name' ]; ?>">
</svg>