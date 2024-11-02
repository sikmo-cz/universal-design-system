<?php

	// DO LOGIC

	$ComponentLoader->preload( 'nav/pagination', [], true );
	$ComponentLoader->preload( 'nav/tab' );
	$ComponentLoader->preload( 'nav/progress' );
	$ComponentLoader->preload( 'nav/vertical-menu' );
	$ComponentLoader->preload( 'nav/breadcrumb' );
	$ComponentLoader->preload( 'nav/button-group' );

	$ComponentLoader->preload( 'data/table' );
	$ComponentLoader->preload( 'data/accordion' );

	$ComponentLoader->preload( 'util/avatar' );
	$ComponentLoader->preload( 'util/avatars' );
	$ComponentLoader->preload( 'util/helper' );
	$ComponentLoader->preload( 'util/chip' );

	$ComponentLoader->preload( 'input/button' );
	$ComponentLoader->preload( 'input/checkbox' );
	$ComponentLoader->preload( 'input/radio' );
	$ComponentLoader->preload( 'input/toggle' );
	$ComponentLoader->preload( 'input/base-input' );
	$ComponentLoader->preload( 'input/date' );
	$ComponentLoader->preload( 'input/time' );
	$ComponentLoader->preload( 'input/textarea' );
	$ComponentLoader->preload( 'input/select' );
	$ComponentLoader->preload( 'input/multi-select' );
	
	include 'header.php';
?>
	<main>
		<div class="container">
			<?php
			/*
			echo "Nav<br>";
			 $ComponentLoader->load( 'nav/pagination', [], true );
			 $ComponentLoader->load( 'nav/tab', [], true );
			 $ComponentLoader->load( 'nav/progress', [], true );
			 $ComponentLoader->load( 'nav/vertical-menu', [], true ); 
			 $ComponentLoader->load( 'nav/breadcrumb', [], true ); 
			 $ComponentLoader->load( 'nav/button-group', [], true ); 
			

			 echo "<br><br><br><br>";

			
			 echo "Data<br>";
			 $ComponentLoader->load( 'data/table', [], true ); 
			 $ComponentLoader->load( 'data/accordion', [], true );


			 echo "<br><br><br><br>";
			
			 echo "Util<br>";
			 $ComponentLoader->load( 'util/chip', [], true ); 
			 $ComponentLoader->load( 'util/avatar', [], true ); 
			 $ComponentLoader->load( 'util/helper', [], true ); 


			 echo "<br><br><br><br>";
			
			 echo "Input<br>";
			 $ComponentLoader->load( 'input/button', [], true );
			 $ComponentLoader->load( 'input/checkbox', [], true );
			 $ComponentLoader->load( 'input/radio', [], true );
			 $ComponentLoader->load( 'input/toggle', [], true );
			 $ComponentLoader->load( 'input/base-input', [], true );	
			 $ComponentLoader->load( 'input/date', [], true );	
			 $ComponentLoader->load( 'input/time', [], true );
			 $ComponentLoader->load( 'input/textarea', [], true );
			 */
			?>
			
		</div>
	</main>
	
<?php

	include 'footer.php';