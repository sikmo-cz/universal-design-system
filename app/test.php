<?php

	// DO LOGIC

	$ComponentLoader->preload( 'nav/pagination' );
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
	$ComponentLoader->preload( 'input/text' );
	$ComponentLoader->preload( 'input/toggle-input' );
	$ComponentLoader->preload( 'input/date' );
	$ComponentLoader->preload( 'input/time' );
	$ComponentLoader->preload( 'input/textarea' );
	$ComponentLoader->preload( 'input/select' );
	$ComponentLoader->preload( 'input/multi-select' );
	
	include 'header.php';
?>
	<main>
		<div class="container">
			<div class="component">
				<div class="row">
					<div class="col-12">
						<span class="super-heading">Headings and text</span>
					</div>
				</div>
				<div class="row">
					<div class="col-6"><span class="component-heading">H1</span></div><div class="col-6"><h1>Nadpis H1</h1></div>
					<div class="col-6"><span class="component-heading">H2</span></div><div class="col-6"><h2>Nadpis H2</h2></div>
					<div class="col-6"><span class="component-heading">H3</span></div><div class="col-6"><h3>Nadpis H3</h3></div>
					<div class="col-6"><span class="component-heading">H4</span></div><div class="col-6"><h4>Nadpis H4</h4></div>
					<div class="col-6"><span class="component-heading">H5</span></div><div class="col-6"><h5>Nadpis H5</h5></div>
					<div class="col-6"><span class="component-heading">H1</span></div><div class="col-6"><h1>Nadpis H1</h1></div>
				</div>
			</div>
		</div>

		<div class="container">

		<svg class="d-block" width="24" height="24"><use href="/dist/images/icons-sprite.svg#3d-arc-center-pt"></svg>
		<svg class="d-block" width="28" height="20"><use href="/dist/images/flags-sprite.svg#cz"></svg>

		<?php
			$ComponentLoader->load( 'input/checkbox', [], true );
			$ComponentLoader->load( 'input/radio', [], true );
			$ComponentLoader->load( 'input/toggle', [], true );
			$ComponentLoader->load( 'input/text', [], true );	
			$ComponentLoader->load( 'input/date', [], true );	
			$ComponentLoader->load( 'input/time', [], true );
			$ComponentLoader->load( 'input/textarea', [], true );
			$ComponentLoader->load( 'input/select', [], true );


			// $ComponentLoader->load( 'buttons/base', [], true );
			// $ComponentLoader->load( 'buttons/base', array(
			// 	'type' 			=> 'link', // 'button' or 'link'
			// 	'href' 			=> '#', // Only for 'link' type
			// 	'content'		=> 'Hehe button', // HTML content inside the button
			// 	'attributes' 	=> array(
			// 		'target'		=> '_blank'
			// 	)
			// ));

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
			 

			 */
		?>		
		</div>
	</main>
	
<?php

	include 'footer.php';