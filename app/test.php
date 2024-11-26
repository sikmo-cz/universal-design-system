<?php	
	// $script_start_time = microtime(true);

	define( 'APP_DIR', __DIR__ );

	include APP_DIR . '/functions.php';

	$get_current_component_page = current_component_page();

	$components = component_list();

	//Starts output buffering before first echo
	ob_start();

		$CL->load( 'util/icon', [], true );
		$CL->load( 'util/flag', [], true );

	$output = ob_get_clean(); //End output buffering

	include 'header.php';
	echo $output; //Echo output buffering (whole HTML)
	include 'footer.php';