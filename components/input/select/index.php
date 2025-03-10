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
		'label'         => '',
		'name'          => '',
		'input_attributes' => array(),
		'helper_text'   => '',
		'helper_type'   => '',
		'search'        => false,
		'multiple'      => false,
		'options'       => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'input-select';

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
	if (!is_array($data['input_attributes'])) throw new Exception('Data "input_attributes" must by type array.');
	if (!is_string($data['helper_text'])) throw new Exception('Data "helper_text" must by type string.');
	if (!is_string($data['helper_type'])) throw new Exception('Data "helper_type" must by type string.');
	if (!is_bool($data['search'])) throw new Exception('Data "search" must by type boolean.');
	if (!is_bool($data['multiple'])) throw new Exception('Data "multiple" must by type boolean.');
	if (!is_array($data['options'])) throw new Exception('Data "options" must by type array.');

	$input_attributes = array();

	if ($data['multiple']) {
		$input_attributes["data-multi"] = "true";
	}

	if ($data['search']) {
		$input_attributes["data-search"] = "true";
	}

	// Extra attributes
	$input_attributes = array_merge( $input_attributes, $data[ 'input_attributes' ] );
?>
<div <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	if (!empty($data['label'])) {
		echo '<span>' . esc_html($data['label']) . '</span>';
	}
	?>
	<div class="custom-select" <?php echo $ComponentLoader->render_attributes( $input_attributes ); ?>>
		<div class="selected-options"><?php echo esc_html( __("Vyberte...") ) ?></div>
		<div class="options-container hidden">
			<input type="text" class="search-input" placeholder="<?php echo esc_attr( __("Vyhledat...") ) ?>">
			<div class="options-containerScroll">
				<?php
				foreach ($data['options'] as $option) {
					$option_attributes = array();

					if (!empty($data['name'])) {
						$option_attributes["name"] = $data['name'] . "[]";
					}

					if (!empty($option['value'])) {
						$option_attributes["value"] = $option['value'];
					}

					if ($option["selected"] ?? false) {
						$option_attributes["checked"] = "checked";
					}

					// Extra option attributes
					$option_attributes = array_merge( $option_attributes, $option['option_attributes'] ?? array() );
				?>
				<div class="option-item">
					<input type="checkbox" class="hidden-checkbox" <?php echo $ComponentLoader->render_attributes( $option_attributes ); ?>>
					<?php echo esc_html($option["text"]) ?>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<?php
	if (!empty($data['helper_text'])) {
		$ComponentLoader->load( 'util/helper', array("text" => $data['helper_text'], "type" => $data['helper_type'], "inline" => true) );
	}
	?>
</div>
