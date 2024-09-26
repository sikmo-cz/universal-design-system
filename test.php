<?php

	// Load the ComponentLoader class
	include 'ComponentLoader.php';

	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader::get_instance();

	// Load the component and pass arguments
	$ComponentLoader->load( 'navigation/breadcrumbs', [], true );

	// Output the registered CSS files (to be placed in <head>)
	$ComponentLoader->output_css();

	// Output the registered JS files (to be placed at the bottom before </body>)
	$ComponentLoader->output_js();