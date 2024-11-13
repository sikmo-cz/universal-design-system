<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload dependencies
	//$ComponentLoader->preload( 'util/avatar' );

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
		'avatars'       => array(),
		'other_count'   => 0,
		'other_tooltip' => '',
	);

	//TODO: mají i size, big a small
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'util-avatars';

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
	if (!is_array($data['avatars'])) throw new Exception('Data "avatars" must by type array.');
	if (!is_string($data['other_count']) AND !is_int($data['other_count'])) throw new Exception('Data "other_count" must by type string or int.');
	if (!is_string($data['other_tooltip'])) throw new Exception('Data "other_tooltip" must by type string.');
?>
<ul <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
		foreach ($data["avatars"] as $avatar) {
			echo "<li>";
			$ComponentLoader->load( 'util/avatar', array(
				'href'          => $avatar["href"],
				'text'          => $avatar["text"],
				'image'         => $avatar["image"],
			));
			echo "</li>";
		}
	?>
	<li>
		<?php
			$ComponentLoader->load( 'util/avatar', array(
				'href'          => '',
				'text'          => '+' . $data['other_count'],
				'image'         => '',
			));
		?>
		<p><?php echo $data['other_tooltip'] ?></p>
	</li>
</ul>


