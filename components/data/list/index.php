<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	//$ComponentLoader->register_js( 'script' );


	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}


	// Default values
	$defaults = array(
		'class'                   => '',
		'id'                      => '',
		'attributes'              => array(),
		'size'                    => '',
		'icon_before'             => '',
		'icon_color'              => '',
    'html_escape'             => true,
		'data'                    => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'data-list';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

	// Class color
	if (in_array($data['icon_color'], array("info", "success", "warning", "danger"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['icon_color'];
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
	if (!is_array($data['data'])) throw new Exception('Data "data" must by type array.');
?>
<div <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<ul>
		<?php
    foreach ($data['data'] as $row) {
			echo '<li>';

			if (!empty($data['icon_before'])) {
				$ComponentLoader->load('util/icon', array('name' => $data['icon_before']));
			}

      echo '<div>' . ($data['html_escape'] ? esc_html($row) : $row) . '</div>';
			echo '</li>';
    }
    ?>
	</ul>
</div>