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

	$base_class = 'nav-vertical-menu';
?>
<nav class="<?php echo $base_class; ?>">
	<p>Dashboard</p>
	<ul>
		<?php for ($i=0; $i < 3; $i++) { ?> 
				<li class="active">
					<a href="#">
						Item
					</a>
					
					<ul>
						<?php for ($i=0; $i < 3; $i++) {  ?>
									<li class="active">
										<a href="#">
											Submenu
										</a>
									</li>
						<?php } ?>	
					</ul>

				</li>
			<?php
		}
		?>
	</ul>
</nav>