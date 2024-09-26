<?php

	// Load the ComponentLoader class
	include 'ComponentLoader.php';

	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader::get_instance();

	// Preload CSS/JS + dependendices
	$ComponentLoader->preload( 'navigation/breadcrumbs' );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Design System</title>

		<!-- Output registered CSS here -->
		<?php $ComponentLoader->output_css(); ?>
	</head>
	<body>

	<!-- Render the component content -->
	<?php $ComponentLoader->load( 'navigation/breadcrumbs', [], true ); ?>

	<!-- Output registered JS here (if any) -->
	<?php $ComponentLoader->output_js(); ?>

	</body>
</html>