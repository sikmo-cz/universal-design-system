<?php

	// Load the ComponentLoader class
	include './../ComponentLoader.php';

	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// maybe prepare icon set
	$ComponentLoader->maybe_prepare_icon_set( 'icons' );
	$ComponentLoader->maybe_prepare_icon_set( 'flags' );

	// testing app
	include ( $_GET[ 'cm' ] ?? false ) ? 'components.php' : 'test.php';