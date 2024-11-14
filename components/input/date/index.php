<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

    $ComponentLoader->preload( 'forms/base-input' );

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );

    $ComponentLoader->register_js( 'easepick.min' );
	$ComponentLoader->register_js( 'script' );

	
	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'input-date';

?>
  <input type="text" class="datepicker" data-range="true" data-min-date="2024-01-01" data-max-date="2024-12-12" data-start-date="2024-10-10" data-end-date="2024-11-11" />
    <!-- tady budu potřebovat nalodovat komponentu pro input se správnými parametry -->
