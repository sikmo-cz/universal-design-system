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

<<<<<<< HEAD
	$base_class = 'nav-vertical-menu';
?>
<nav class="<?php echo $base_class; ?>">
	<p>Dashboard</p>
	<ul>
		<li><a href="#">Položka</a></li>
		<?php for ($i=0; $i < 3; $i++) { ?> 
				<li class="active">
					<a href="#">
						Item
					</a>
					<button></button>
					
					<ul>
						<?php for ($ii=0; $ii < 3; $ii++) {  ?>
								<li class="active">
									<a href="#">
										Submenu
									</a>
								</li>
						<?php } ?>	
					</ul>
=======
>>>>>>> 1096b134a575171ee5bc3ce951340ecc8faa81cb

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
	$base_class = 'nav-vertical-menu';

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
<nav <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	if (!empty($data['caption'])) {
	?>
	<p><?php echo esc_html($data['caption']) ?></p>
	<?php
	}
	?>
	<ul>
		<?php
		foreach ($data['items'] as $item) {
			$item_active_class = "";
			if ($item["active"] ?? false) {
				$item_active_class = ' class="active"';
			}
		?>
		<li<?php echo $item_active_class ?>>
			<a href="<?php echo esc_attr($item["href"] ?? "#") ?>">
				<?php echo esc_html($item["text"] ?? "") ?>
			</a>
			<?php
			if (isset($item["sub_items"]) AND is_array($item["sub_items"])) {
			?>
				<ul>
					<?php
					foreach ($item["sub_items"] as $sub_item) {
						$sub_item_active_class = "";
						if ($sub_item["active"] ?? false) {
							$sub_item_active_class = ' class="active"';
						}
					?>
					<li<?php echo $sub_item_active_class ?>>
						<a href="<?php echo esc_attr($sub_item["href"] ?? "#") ?>">
							<?php echo esc_html($sub_item["text"] ?? "") ?>
						</a>
					</li>
					<?php
					}
					?>
				</ul>
			<?php
			}
			?>
		</li>
		<?php
		}
		?>
	</ul>
</nav>