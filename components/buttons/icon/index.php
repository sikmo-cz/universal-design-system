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

	$base_class = 'button-icon';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}


?>
<?php
	if( $data['type'] == 'button' ) {
		echo "<button type='submit' ";
	}
	else {
		echo "<a href='" . $data['href'] . "' ";
	}
?>
	class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
	<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
	<?php echo isset($data['target']) ? "target='" . $data['target'] . "'" : ''; ?>
	<?php echo isset($data['icon']) ? "data-icon-before='" . $data['icon'] . "'" : ''; ?>
	<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
>

<?php
	if( $data['type'] == 'button' ) {
		echo "</button>";
	}
	else {
		echo "</a>";
	}
?>
