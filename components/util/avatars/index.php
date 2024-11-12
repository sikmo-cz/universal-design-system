<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload dependencies
	$ComponentLoader->preload( 'util/avatar' );

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'util-avatars'; //util-avatars--small
?>
<ul class="<?php echo $base_class; ?>">
	<?php
		for( $i = 0; $i < 5; $i++ ) {
			echo "<li>";
			$ComponentLoader->load( 'util/avatar', [], true );
			echo "</li>";
		}
	?>
	<span>+3</span>
</ul>


