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

	$base_class = 'forms-select';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

	if( !isset( $data['type'] ) && empty( data['type'] ) ) {
		$data['type'] = "text";
	}


?>
<label class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>">
	<?php echo $data['text']; ?>
	<div>
		<select type="text" class="<?php echo isset($data['input-class']) ? $data['input-class'] : ''; ?>"
			<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
			<?php echo isset($data['name']) ? "name='" . $data['name'] . "'" : ''; ?>
			<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
			<?php echo isset($data['value']) ? $data['value'] : ''; ?>
		>
		<?php if ( isset( $data['options'] )) { ?>
			<ul>
				<?php foreach (  $data['options']  as $key => $option) { 	?> 
					<option <?php echo isset($data['value']) ? $data['value'] : ''; ?> <?php echo isset($data['checked']) ? "checked": ''; ?>>
							<?php echo $option['text']; ?>
					</option>
				<?php } ?>	
			</ul>
			<?php } ?>	
		</select>
	</div>

	<div class="<?php echo $base_class; ?>__helperText <?php echo isset($data['helper-type']) ? $data['helper-type'] : ''; ?>">
		<?php echo isset($data['helper-text']) ? $data['helper-text'] : ''; ?>
	</div>
</label>
