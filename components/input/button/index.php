<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload dependencies
	$ComponentLoader->preload( 'util/icon' );

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
		'type'          => 'button:submit',
		'href'          => '#',
		'variant'       => 'primary',
		'icon_before'   => '',
		'icon_after'    => '',
		'text'          => 'Submit',
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'input-button';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

	// Class variant
	if (in_array($data['variant'], array("primary", "secondary", "tertiary", "text", "icon"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['variant'];
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
	if (!is_string($data['type'])) throw new Exception('Data "type" must by type string.');
	if (!is_string($data['href'])) throw new Exception('Data "href" must by type string.');
	if (!is_string($data['variant'])) throw new Exception('Data "variant" must by type string.');
	if (!is_string($data['icon_before'])) throw new Exception('Data "icon_before" must by type string.');
	if (!is_string($data['icon_after'])) throw new Exception('Data "icon_after" must by type string.');
	if (!is_string($data['text'])) throw new Exception('Data "text" must by type string.');

	$html_attributes = $ComponentLoader->render_attributes( $attributes );

	//Type
	$html_open_tag = '<button type="submit" ' . $html_attributes . '>';
	$html_close_tag = '</button>';

	if ($data['type'] === "button") {
		$html_open_tag = '<button ' . $html_attributes . '>';
		$html_close_tag = '</button>';
	} elseif ($data['type'] === "a") {
		$html_open_tag = '<a href="' . esc_attr( $data['href'] ) . '" ' . $html_attributes . '>';
		$html_close_tag = '</a>';
	} elseif ($data['type'] === "div") {
		$html_open_tag = '<div ' . $html_attributes . '>';
		$html_close_tag = '</div>';
	} elseif ($data['type'] === "span") {
		$html_open_tag = '<span ' . $html_attributes . '>';
		$html_close_tag = '</span>';
	}
?>
<?php echo $html_open_tag ?>
	<?php
	if (!empty($data["icon_before"])) {
		$ComponentLoader->load( 'util/icon', array( 'name' => $data["icon_before"] ) );
	}
	?>
	<span><?php echo esc_html( $data['text'] ) ?></span>
	<?php
	if (!empty($data["icon_after"])) {
		$ComponentLoader->load( 'util/icon', array( 'name' => $data["icon_after"] ) );
	}
	?>
<?php echo $html_close_tag ?>