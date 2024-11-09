<?php	

	// preloading
	$CL->preload( 'input/text' );

	include 'header.php';

	$components = array(
		'Typography', 'Colors', 'Styles',
		'-',
		'Buttons', 'Paginaton', 'Tabs', 'Checkboxes & Radio buttons', 'Toggle', 'Menu items',
		'-',
		'Inputs', 'Avatars', 'Chips', 'Tables', 'Breadcrumbs', 'Stepper / Progress', 'Accordions',
		'-',
		'Icons', 'Flags',
	);
?>
	<main class="container pt-4">
		<div class="row">
			<aside class="col-2">
				<ul class="sidebar">
				<?php foreach( (array) $components as $component ) { ?>
					<?php if( $component == '-' ) { ?>
						<li class="spacer"></li>
					<?php } else { ?>
						<li><a href="#<?php echo slugify( $component ); ?>"><?php echo $component; ?></a></li>
					<?php } ?>
				<?php } ?>
				</ul>
			</aside>

			<article class="col-10">
				<?php 
					foreach( (array) $components as $component ) {
						$slug = slugify( $component );

						if( $component == '-' || ! file_exists( "./app/components/{$slug}.php" ) ) 
						{
							continue;
						}						
				?>
				<div class="component component--<?php echo $slug; ?> mb-4" id="<?php echo $slug; ?>">
					<h2 class="super-heading"><?php echo $component; ?></h2>
					<div class="row">
						<?php include "./app/components/{$slug}.php"; ?>
					</div>
				</div>
				<?php } ?>
			</article>
		</div>
	</main>
<?php

	include 'footer.php';