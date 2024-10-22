<?php

	// DO LOGIC

	
	$ComponentLoader->preload( 'forms/checkbox' );
	$ComponentLoader->preload( 'forms/radio' );
	$ComponentLoader->preload( 'forms/toggle' );
	$ComponentLoader->preload( 'forms/base-input' );
	$ComponentLoader->preload( 'forms/date' );
	$ComponentLoader->preload( 'forms/time' );
	$ComponentLoader->preload( 'forms/textarea' );
	$ComponentLoader->preload( 'forms/select' );
	$ComponentLoader->preload( 'forms/multi-select' );


	$ComponentLoader->preload( 'buttons/base' );
	$ComponentLoader->preload( 'buttons/text' );
	$ComponentLoader->preload( 'buttons/icon' );

	$ComponentLoader->preload( 'pagination/pagination' );

	$ComponentLoader->preload( 'tabs/tabs' );

	$ComponentLoader->preload( 'menus/vertical' );

	$ComponentLoader->preload( 'avatars/avatar' );
	$ComponentLoader->preload( 'avatars/avatars' );

	$ComponentLoader->preload( 'chips/chips' );

	$ComponentLoader->preload( 'navigation/breadcrumbs' );

	$ComponentLoader->preload( 'steppers/progress' );


	include 'header.php';
?>

	<main>
		<div class="container">
			<H2>Forms elements</H2>
			<?php $ComponentLoader->load( 'forms/checkbox', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/radio', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/toggle', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/base-input', [], true ); ?>	
			<?php $ComponentLoader->load( 'forms/date', [], true ); ?>	
			<?php $ComponentLoader->load( 'forms/time', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/textarea', [], true ); ?>

			<hr>
			Buttons<br>
			<?php $ComponentLoader->load( 'buttons/base', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/text', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/icon', [], true ); ?>

			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>
			<br><br><br><br><br><br><br><br><br><br><br><br><br>

	
			<?php $ComponentLoader->load( 'forms/textarea', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/select', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/multi-select', [], true ); ?>
			

			<hr>
			pagination<br>
			<?php $ComponentLoader->load( 'pagination/pagination', [], true ); ?>
			<hr>
			tabs<br>
			<?php $ComponentLoader->load( 'tabs/tabs', [], true ); ?>
			<hr>
			Menu<br> 
			<?php $ComponentLoader->load( 'menus/vertical', [], true ); ?>
			
			Avatars<br> 
			<?php $ComponentLoader->load( 'avatars/avatar', [], true ); ?>
			<?php $ComponentLoader->load( 'avatars/avatars', [], true ); ?>
			Steppers<br> 
			<?php $ComponentLoader->load( 'steppers/progress', [], true ); ?>
			Accordions<br> 
			<?php $ComponentLoader->load( 'accordions/base', [], true ); ?>
			
		</div>
	</main>
	
<?php

	include 'footer.php';