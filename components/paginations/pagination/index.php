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

	$base_class = 'paginations-pagination';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
<ul class="<?php echo $base_class; ?>">
	<li class="<?php echo $base_class; ?>__prev"><a href="<?php echo $data['prev-href']; ?>"></a></li>
	<?php for ($i=0; $i < 3; $i++) { 
		# code...
		?> 
			<li class="active">
				<a href="#">
					1
				</a>
			</li>
		<?php
	}
	?>
	<li class="<?php echo $base_class; ?>__next"><a href="<?php echo $data['next-href']; ?>"></a></li>
</ul>
