<?php	

	define( 'APP_DIR', __DIR__ );

	include APP_DIR . '/functions.php';

	$get_current_component_page = current_component_page();

	// preloading
	$CL->preload( 'nav/pagination' );
	$CL->preload( 'nav/tab' );
	$CL->preload( 'nav/progress' );
	$CL->preload( 'nav/vertical-menu' );
	$CL->preload( 'nav/breadcrumb' );
	$CL->preload( 'nav/button-group' );

	$CL->preload( 'data/table' );
	$CL->preload( 'data/accordion' );

	$CL->preload( 'util/avatar' );
	//$CL->preload( 'util/avatars' ); //skipped, not finished yet by design
	$CL->preload( 'util/helper' );
	$CL->preload( 'util/chip' );


	$CL->preload( 'input/text' );

	$components = component_list();

	include 'header.php';
?>
	<main class="container pt-4">
		<div class="row">
			<aside class="col-12 col-lg-3">
				<ul class="sidebar">
				<?php foreach( (array) $components as $component ) { ?>
					<?php if( $component == '-' ) { ?>
						<li class="spacer"></li>
					<?php } else { ?>
						<li><a href="/<?php echo slugify( $component ); ?>/"><?php echo $component; ?></a></li>
					<?php } ?>
				<?php } ?>
				</ul>
			</aside>

			<article class="col-12 col-lg-9">
				<?php 
					foreach( (array) $components as $component ) {
						$slug = slugify( $component );

						if( $component == '-' || ! file_exists( APP_DIR . "/components/{$slug}.php" ) ) 
						{
							continue;
						}
						
						if( $slug != $get_current_component_page ) 
						{
							continue;
						}
				?>
				<div class="component component--<?php echo $slug; ?> mb-4" id="<?php echo $slug; ?>">
					<h2 class="super-heading"><?php echo $component; ?></h2>
					<div class="row">
						<?php include APP_DIR . "/components/{$slug}.php"; ?>
					</div>
				</div>
				<?php } ?>
			</article>
		</div>
	</main>
<?php

	include 'footer.php';