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
		'items'         => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'nav-progress';

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
	if (!is_array($data['items'])) throw new Exception('Data "items" must by type array.');
?>
<ul <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	foreach ($data["items"] as $item) {
		$a_class = "";
		if ($item["done"] ?? false) {
			$a_class = ' class="done"';
		} elseif (!($item["active"] ?? false)) {
			$a_class = ' class="innactive"';
		}

		$a_tag_start = "<div". $a_class .">";
		$a_tag_end = "</div>";
		if (!empty($item["href"] ?? "")) {
			$a_tag_start = '<a href="'. esc_attr($item["href"]) .'"'. $a_class .'>';
			$a_tag_end = "</a>";
		}
	?>
	<li><?php echo $a_tag_start ?><span><?php echo esc_html($item["step"] ?? "") ?></span><?php echo esc_html($item["text"] ?? "") ?><?php echo $a_tag_end ?></li>
	<?php
	}
	?>
</ul>
