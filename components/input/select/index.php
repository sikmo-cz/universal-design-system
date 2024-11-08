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

	$base_class = 'input-select';
	//

?>
<div class="<?php echo $base_class; ?>">
	<span>Label</span>
	<div class="custom-select" data-multi="true" data-search="true">
		<div class="selected-options">Vyberte...</div>
		<div class="options-container hidden">
			<input type="text" class="search-input" placeholder="Vyhledat...">
			<div class="options-containerScroll">
				<div class="option-item">
					<input type="checkbox" class="hidden-checkbox" name="options1[]" value="Možnost 1">
					Možnost 1
				</div>
				<div class="option-item">
					<input type="checkbox" class="hidden-checkbox" name="options1[]" value="Možnost 2">
					Možnost 2
				</div>
			</div>
		</div>
	</div>

	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>
</div>
