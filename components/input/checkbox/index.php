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
		'name'          => '',
		'checked'       => false,
		'value'       	=> '',
		'input_attributes' => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'forms-checkbox';

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
	if (!is_string($data['name'])) throw new Exception('Data "name" must by type string.');
	if (!is_bool($data['checked'])) throw new Exception('Data "checked" must by type boolean.');
	if (!is_string($data['value'])) throw new Exception('Data "value" must by type string.');
	if (!is_array($data['input_attributes'])) throw new Exception('Data "input_attributes" must by type array.');

	$input_attributes = array();
	if (!empty($data['name'])) {
		$input_attributes["name"] = $data['name'];
	}

	if(!empty($data['value'])) {
		$input_attributes["value"] = $data['value'];
	}

	if($data['checked']) {
		$input_attributes["checked"] = "checked";
	}

	// Extra attributes
	$input_attributes = array_merge( $input_attributes, $data[ 'input_attributes' ] );
?>
<label <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<input type="checkbox" <?php echo $ComponentLoader->render_attributes( $input_attributes ); ?>>
	<?php echo esc_html( $data["text"] ) ?>
</label>
