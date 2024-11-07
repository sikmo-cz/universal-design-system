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


?>
<div class="<?php echo $base_class; ?>">
	<span>Label</span>
	<div class="custom-select">
		<div class="selected-options" onclick="toggleOptions()">Vyberte...</div>
		<div class="options-container hidden">
			<input type="text" class="search-input" onkeyup="filterOptions()" placeholder="Vyhledat...">
			
			<!-- Jednotlivé položky s checkboxy -->
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 1">
			<span>Možnost 1</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 2">
			<span>Možnost 2</span>
			</div>
			<div class="option-item"  onclick="selectOption(this)">
			<input type="checkbox" class="hidden-checkbox" name="options[]" value="Možnost 3">
			<span>Možnost 3</span>
			</div>
		</div>
	</div>
	<?php $ComponentLoader->load( 'forms/helper', [], true ); ?>
</div>
