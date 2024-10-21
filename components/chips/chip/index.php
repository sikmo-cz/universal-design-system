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

	$base_class = 'chips-chip';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

	if( isset( $data['color'] ) && !empty( $data['color'] ) ) {
		$data['class'] .= "{$base_class}--{$data['color']}";
	}
	else {
		$data['class'] .= "{$base_class}--dark1000";
	}
?>
<?php
	if( !isset($data['href']) ) {
		echo "<div ";
	}
	else {
		echo "<a href='" . $data['href'] . "' ";
	}
?>
	class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
	<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
	<?php echo isset($data['icon-before']) ? "data-icon-before='" . $data['icon-before'] . "'" : ''; ?>
	<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
>
		<?php if( isset( $data['text'] ) ) { echo "<span>" . $data['text'] . "</span>"; } else { $data['text'] = ""; } ?>
		<?php if( isset( $data['image'] ) ) { 
			echo "<img src='{$data['image']}' title='{$data['text']}'>"; } 
		?>
<?php
	if( !isset($data['href']) ) {
		echo "</div>";
	}
	else {
		echo "</a>";
	}
?>
