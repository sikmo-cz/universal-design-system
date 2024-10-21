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

	$base_class = 'forms-toggle';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}


?>
<input type="checkbox"
	class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
	<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
	<?php if( isset( $data['extra-attr'] ) ) { echo $data['extra-attr']; } ?> 
	name='<?php if( isset( $data['name'] ) ) { echo $data['name']; } ?>'
	value="<?php echo $data['value']; ?>"
	<?php if( isset( $data['checked'] ) && $data['checked'] == 'true' ) { echo 'checked'; } ?>
>
