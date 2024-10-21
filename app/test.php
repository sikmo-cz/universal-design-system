<?php

	// DO LOGIC

	$ComponentLoader->preload( 'navigation/breadcrumbs' );
	
	$ComponentLoader->preload( 'forms/checkbox' );
	$ComponentLoader->preload( 'forms/radio' );
	$ComponentLoader->preload( 'forms/toggle' );
	$ComponentLoader->preload( 'forms/base-input' );
	$ComponentLoader->preload( 'forms/textarea' );
	$ComponentLoader->preload( 'forms/select' );
	$ComponentLoader->preload( 'forms/multi-select' );


	$ComponentLoader->preload( 'buttons/primary' );
	$ComponentLoader->preload( 'buttons/secondary' );
	$ComponentLoader->preload( 'buttons/tertiary' );
	$ComponentLoader->preload( 'buttons/text' );
	$ComponentLoader->preload( 'buttons/icon' );

	$ComponentLoader->preload( 'pagination/pagination' );

	$ComponentLoader->preload( 'tabs/tabs' );

	$ComponentLoader->preload( 'menus/vertical' );

	$ComponentLoader->preload( 'avatars/avatar' );
	$ComponentLoader->preload( 'avatars/avatars' );
?>

	<main>
		<div class="container">
			<!-- Render the component content -->
			<?php $ComponentLoader->load( 'navigation/breadcrumbs', [], true ); ?>
		</div>
		<div>
			forms<br>
			<?php $ComponentLoader->load( 'forms/checkbox', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/radio', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/toggle', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/base-input', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/textarea', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/select', [], true ); ?>
			<?php $ComponentLoader->load( 'forms/multi-select', [], true ); ?>
			<!-- 
			<hr>
			Buttons<br>
			<?php $ComponentLoader->load( 'buttons/primary', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/secondary', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/tertiary', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/text', [], true ); ?>
			<?php $ComponentLoader->load( 'buttons/icon', [], true ); ?>
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
			-->

		</div>
	</main>
	
<?php

	include 'footer.php';