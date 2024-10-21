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

	$base_class = 'steppers-progress';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
	<ul class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
		<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
		<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
	>
		<?php foreach (  $data['items']  as $key => $item) {
			?> 
				<li <?php if ( isset( $item['active'] )) { echo 'class="active"'; } ?>>
					<a href="<?php echo $item['href']; ?>">
						<?php echo $item['text']; ?>
					</a>
				</li>
			<?php
		}
		?>
	</ul>
</div>