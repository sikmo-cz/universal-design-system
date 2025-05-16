<?php
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Design System</title>
		
		<link rel="stylesheet" href="/dist/style.css">

		<!-- Output registered CSS here -->
		<?php $CL->output_css(); ?>

		<link rel="stylesheet" href="/app/assets/css/style.css?v=<?php echo uniqid(); ?>">
	</head>
	<body>