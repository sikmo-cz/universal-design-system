<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload any components that this component relies on
	$ComponentLoader->preload( 'util/helper' );
	
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
		'label'         => '',
		'name'          => '',
		'value'         => '',
		'input_attributes' => array(),
		'helper_text'   => '',
		'helper_type'   => '',
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'input-textarea';

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
	if (!is_string($data['label'])) throw new Exception('Data "label" must by type string.');
	if (!is_string($data['name'])) throw new Exception('Data "name" must by type string.');
	if (!is_string($data['value'])) throw new Exception('Data "value" must by type string.');
	if (!is_array($data['input_attributes'])) throw new Exception('Data "input_attributes" must by type array.');
	if (!is_string($data['helper_text'])) throw new Exception('Data "helper_text" must by type string.');
	if (!is_string($data['helper_type'])) throw new Exception('Data "helper_type" must by type string.');

	$input_attributes = array();
	if (!empty($data['name'])) {
		$input_attributes["name"] = $data['name'];
	}

	// Extra attributes
	$input_attributes = array_merge( $input_attributes, $data[ 'input_attributes' ] );
?>
<label <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	if (!empty($data['label'])) {
		echo '<span>' . esc_html($data['label']) . '</span>';
	}
	?>
	<div>
		<textarea <?php echo $ComponentLoader->render_attributes( $input_attributes ); ?>><?php echo esc_textarea($data['value']) ?></textarea>
	</div>
	<?php
	if (!empty($data['helper_text'])) {
		$ComponentLoader->load( 'util/helper', array("text" => $data['helper_text'], "type" => $data['helper_type']) );
	}
	?>
</label>
