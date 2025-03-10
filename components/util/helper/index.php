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


	// Default values
	$defaults = array(
		'class'         => '',
		'id'            => '',
		'attributes'    => array(),
		'size'          => '',
		'text'          => '',
		'type'          => '',
		'inline'        => false,
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'util-helper';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

	// Id
	if (!empty($data["id"])) $attributes["id"] = strval( $data["id"] );

	// Attributes
	if ( is_array( $data[ 'attributes' ] ) ) {
		$attributes = array_merge( $attributes, $data[ 'attributes' ] );
	}

	/*
		=============================
		===			SPECIFIC DATA			===
		=============================
	*/

	//Checks
	if (!is_string($data['text'])) throw new Exception('Data "text" must by type string.');
	if (!is_string($data['type'])) throw new Exception('Data "type" must by type string.');

	if (!$data['inline']) {
		$attributes["class"] .= " " . $base_class . "--block";
	}

	if ($data['type'] === "info") {
		$attributes["class"] .= " " . $base_class . "--info";
		$icon = "info-circle";
	} elseif ($data['type'] === "warning") {
		$attributes["class"] .= " " . $base_class . "--warning";
		$icon = "warning-circle";
	} elseif ($data['type'] === "danger") {
		$attributes["class"] .= " " . $base_class . "--danger";
		$icon = "warning-circle";
	} elseif ($data['type'] === "success") {
		$attributes["class"] .= " " . $base_class . "--success";
		$icon = "check-circle";
	} else {
		$icon = "info-circle";
	}
?>
<p <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	if (!empty($icon)) {
		$ComponentLoader->load( 'util/icon', array( 'name' => $icon ) );
	}
	?>
	<?php echo esc_html($data['text']) ?>
</p>
