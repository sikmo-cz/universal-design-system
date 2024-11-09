<?php	
	include 'header.php';

	$icon_list = $CL->get_list_of_icons( 'icons' );
?>
	<main class="container pt-5">
		<div class="row">
			<aside class="col-2">
				<ul class="sidebar">
					<li><a href="#<?php echo slugify( 'Typography' ); ?>">Typography</a></li>
					<li><a href="#<?php echo slugify( 'Colors' ); ?>">Colors</a></li>
					<li><a href="#<?php echo slugify( 'Styles' ); ?>">Styles</a></li>

					<li class="spacer"></li>
					
					<li><a href="#<?php echo slugify( 'Typography' ); ?>">Typography</a></li>

					<li class="spacer"></li>

					<li><a href="#<?php echo slugify( 'Icons' ); ?>">Icons</a></li>
					<li><a href="#<?php echo slugify( 'Flags' ); ?>">Flags</a></li>
				</ul>
			</aside>
			<article class="col-10">

				<div class="component mb-5" id="<?php echo slugify( 'Typography' ); ?>">
					<div class="row">
						<div class="col-12">
							<span class="super-heading">Typography</span>
						</div>
					</div>
					<div class="row">
						<div class="col-6"><span class="component-heading">H1</span></div><div class="col-6"><h1>Nadpis H1</h1></div>
						<div class="col-6"><span class="component-heading">H2</span></div><div class="col-6"><h2>Nadpis H2</h2></div>
						<div class="col-6"><span class="component-heading">H3</span></div><div class="col-6"><h3>Nadpis H3</h3></div>
						<div class="col-6"><span class="component-heading">H4</span></div><div class="col-6"><h4>Nadpis H4</h4></div>
						<div class="col-6"><span class="component-heading">H5</span></div><div class="col-6"><h5>Nadpis H5</h5></div>
					</div>
				</div>
			
				<?php if( $icon_list ) { ?>
				<div class="component mb-5" id="<?php echo slugify( 'Icons' ); ?>">
					<div class="row">
						<div class="col-12">
							<span class="super-heading">Icons</span>
						</div>
					</div>
					<div class="row" style="--bs-gutter-y: 1.5rem;">
						<?php foreach( (array) $icon_list as $filename => $filepath ) { ?>
						<div class="col-1" style="text-align: center; font-size: 12px; line-height: 1;">
							<img loading="lazy" class="mb-2" src="<?php echo $filepath; ?>" alt="<?php echo $filename; ?>">
							<p ><?php echo $filename; ?></p>
						</div>
						<?php } ?>
					</div>
				</div>
			
				<?php } ?>
			</article>
		</div>
	</main>
<?php

	include 'footer.php';