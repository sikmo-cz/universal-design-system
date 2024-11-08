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
  <input type="text" class="datepicker" data-range="true" data-min-date="2025-11-08" data-max-date="2025-12-31" data-start-date="2024-03-01" data-end-date="2024-03-15" />
  <input type="text" class="datepicker" data-range="false" />
    <!-- tady budu potřebovat nalodovat komponentu pro input se správnými parametry -->

