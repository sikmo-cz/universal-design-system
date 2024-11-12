<?php
	// DO LOGIC

	$CL->preload( 'nav/pagination' );
	$CL->preload( 'nav/tab' );
	$CL->preload( 'nav/progress' );
	$CL->preload( 'nav/vertical-menu' );
	$CL->preload( 'nav/breadcrumb' );
	$CL->preload( 'nav/button-group' );

	$CL->preload( 'data/table' );
	$CL->preload( 'data/accordion' );

	$CL->preload( 'util/avatar' );
	$CL->preload( 'util/avatars' );
	$CL->preload( 'util/helper' );
	$CL->preload( 'util/chip' );

	$CL->preload( 'input/button' );
	$CL->preload( 'input/checkbox' );
	$CL->preload( 'input/radio' );
	$CL->preload( 'input/toggle' );
	$CL->preload( 'input/text' );
	$CL->preload( 'input/time' );
	$CL->preload( 'input/textarea' );
	$CL->preload( 'input/select' );
	$CL->preload( 'input/date' );
	
	include 'header.php';
?>
	<main>
		<div class="container">

		<?php

echo "============";

$CL->load( 'util/avatars', [], true ); 


echo "============";

			// PAVLOVA UKÁZKA BUTTONŮ - ALE BUTTONU JSOU POTÉ AŽ V INPUTECH
			// $CL->load( 'buttons/base', [], true );
			// $CL->load( 'buttons/base', array(
			// 	'type' 			=> 'link', // 'button' or 'link'
			// 	'href' 			=> '#', // Only for 'link' type
			// 	'content'		=> 'Hehe button', // HTML content inside the button
			// 	'attributes' 	=> array(
			// 		'target'		=> '_blank'
			// 	)
			// ));

			/*
			echo "Nav<br>";
			$CL->load( 'nav/pagination', [], true );
			$CL->load( 'nav/tab', [], true );
			$CL->load( 'nav/progress', [], true );
			$CL->load( 'nav/vertical-menu', [], true ); 
			$CL->load( 'nav/breadcrumb', [], true ); 
			$CL->load( 'nav/button-group', [], true ); 
			

			echo "<br><br><br><br>";

			
			echo "Data<br>";
			$CL->load( 'data/table', [], true ); 
			$CL->load( 'data/accordion', [], true );
		

			echo "<br><br><br><br>";
			
			echo "Util<br>";
			$CL->load( 'util/chip', [], true ); 
			$CL->load( 'util/avatar', [], true ); 
			$CL->load( 'util/helper', [], true ); 


			echo "<br><br><br><br>";
			
			echo "Input<br>";
			$CL->load( 'input/button', [], true );
			$CL->load( 'input/checkbox', [], true );
			$CL->load( 'input/radio', [], true );
			$CL->load( 'input/toggle', [], true );
			$CL->load( 'input/text', [], true );	
			$CL->load( 'input/select', [], true );
			$CL->load( 'input/time', [], true ); //Vlastně bude stejný jakO SELECT, jen správně generovat data
			$CL->load( 'input/textarea', [], true );
			$CL->load( 'input/date', [], true ); 
			*/
		?>		
		</div>
	</main>
	
<?php

	include 'footer.php';