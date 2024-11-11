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
		'href'          => '',
		'text'          => '',
		'size'          => '',
		'image'         => '',
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'util-avatar';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

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
	if (!is_string($data['href'])) throw new Exception('Data "href" must by type string.');
	if (!is_string($data['text'])) throw new Exception('Data "text" must by type string.');
	if (!is_string($data['size'])) throw new Exception('Data "size" must by type string.');
	if (!is_string($data['image'])) throw new Exception('Data "image" must by type string.');

	if ($data['size'] === "small") {
		$attributes["class"] .= " " . $base_class . "--small";
	}
	if ($data['size'] === "big") {
		$attributes["class"] .= " " . $base_class . "--big";
	}
?>
<?php
if (empty($data['href'])) {
?>
	<div <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
<?php
} else {
?>
	<a href="<?php echo esc_attr($data['href']) ?>" <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
<?php
}
?>
	<?php echo esc_html($data['text']) ?>
	<img src='<?php echo esc_attr($data['image']) ?>' alt=''>
<?php
if (empty($data['href'])) {
?>
	</div>
<?php
} else {
?>
	</a>
<?php
}
?>