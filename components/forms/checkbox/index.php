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

	$base_class = 'forms-checkbox';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}


?>
<label class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>">
	<input type="checkbox" class="<?php echo isset($data['input-class']) ? $data['input-class'] : ''; ?>"
	<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
	<?php echo isset($data['name']) ? "name='" . $data['name'] . "'" : ''; ?>
	<?php echo isset($data['value']) ? "value='" . $data['value'] . "'" : ''; ?>
	<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
>
	<?php echo $data['text']; ?>
</label>
