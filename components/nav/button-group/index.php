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
		'items'         => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'nav-button-group';

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
	if (!is_array($data['items'])) throw new Exception('Data "items" must by type array.');
?>
<ul <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
  foreach ($data['items'] as $item) {
		$li_class = "";
		if ($item["active"] ?? false) {
			$li_class = ' class="active"';
		}
  ?>
  <li<?php echo $li_class ?>>
    <a href="<?php echo esc_attr($item["href"] ?? "#") ?>">
      <?php echo esc_html($item["text"] ?? "") ?>
    </a>
  </li>
  <?php
  }
  ?>
</ul>