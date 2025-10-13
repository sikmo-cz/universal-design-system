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
		'name'          => '',
		'value'         => 0,
		'input_attributes' => array(),
		'min'           => 0,
		'max'           => 100,
		'step'          => 10,
		'unit'          => '',
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'input-range';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

	// Id
	if (!empty($data["id"])) $attributes["id"] = strval( $data["id"] );

	// Data
	$attributes["data-min"] = strval( $data["min"] );
	$attributes["data-max"] = strval( $data["max"] );
	$attributes["data-step"] = strval( $data["step"] );
	$attributes["data-initial-value"] = strval( $data["value"] );

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
	if (!is_string($data['name'])) throw new Exception('Data "name" must be type string.');
	if (!is_int($data['value']) && !is_float($data['value'])) throw new Exception('Data "value" must be an integer or float.');
	if (!is_array($data['input_attributes'])) throw new Exception('Data "input_attributes" must be type array.');
	if (!is_int($data['min']) && !is_float($data['min'])) throw new Exception('Data "min" must be an integer or float.');
	if (!is_int($data['max']) && !is_float($data['max'])) throw new Exception('Data "max" must be an integer or float.');
	if (!is_int($data['step']) && !is_float($data['step'])) throw new Exception('Data "step" must be an integer or float.');
	if (!is_string($data['unit'])) throw new Exception('Data "unit" must be type string.');

	$input_attributes = array();

	$input_attributes["type"] = "hidden";

	if (!empty($data['name'])) {
		$input_attributes["name"] = $data['name'];
	}

	// Extra attributes
	$input_attributes = array_merge( $input_attributes, $data[ 'input_attributes' ] );
?>
<div <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<a href="#" class="<?php echo $base_class . '__button-minus' ?>">
		<?php
			$ComponentLoader->load( 'util/icon', array(
				'name' => 'minus',
				'width' => 20,
			));
		?>
	</a>
	<div class="<?php echo $base_class . '__value-container' ?>">
		<input <?php echo $ComponentLoader->render_attributes( $input_attributes ); ?>>
		<span class="<?php echo $base_class . '__plus' ?>"></span>
		<span class="<?php echo $base_class . '__value' ?>"></span>
		<span><?php echo esc_html($data["unit"]); ?></span>
	</div>
	<a href="#" class="<?php echo $base_class . '__button-plus' ?>">
		<?php
			$ComponentLoader->load( 'util/icon', array(
				'name' => 'plus',
				'width' => 20,
			));
		?>
	</a>
</div>