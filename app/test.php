<?php

	// DO LOGIC

	$ComponentLoader->preload( 'navigation/breadcrumbs' );

	include 'header.php';
?>

	<main>
		<div class="container">
			<!-- Render the component content -->
			<?php $ComponentLoader->load( 'navigation/breadcrumbs', [], true ); ?>
		</div>
	</main>
	
<?php

	include 'footer.php';