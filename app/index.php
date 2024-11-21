<?php	
	// $script_start_time = microtime(true);

	define( 'APP_DIR', __DIR__ );

	include APP_DIR . '/functions.php';

	$get_current_component_page = current_component_page();

	$components = component_list();

	//Starts output buffering before first echo
	ob_start();
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
					<h2 class="super-heading">
						<span><?php echo $component; ?></span>
						<div>
							<div>code</div>
							<?php
							$CL->load('input/toggle', array(
								"size" => "small",
								"input_attributes" => array("class" => "js-content-switch-checkbox"),
							));
							?>
						</div>
					</h2>

					<div class="content_switch js-content-switch-examples show">
						<div class="row">
							<?php include APP_DIR . "/components/{$slug}.php"; ?>
						</div>
					</div>

					<div class="content_switch js-content-switch-code">
						<div class="row">
								<?php
								$content = file_get_contents( APP_DIR . "/components/{$slug}.php" );
								// Use regex to extract placeholders
								preg_match_all("/load\\(\\s*'([^']+)'/", $content, $matches);
								$components_to_load = array_unique($matches[1]);

								$component_loader_base_path = $CL->get_design_system_folder_path();

								foreach ($components_to_load as $component) {
									$data = file_get_contents($component_loader_base_path . "/components/" . $component . "/data.php");

									$pattern = "/array\\((.*)\\);/s";
									preg_match($pattern, $data, $matches);

									$innerArray = trim($matches[1], PHP_EOL);

									echo '<p class="mt-5">' . esc_html($component) . '</p>';
									echo '<pre><code class="php">$CL->load(\''. esc_html($component) .'\', array(' . PHP_EOL . esc_html($innerArray) . PHP_EOL . '));</code></pre>';
								}
								?>
						</div>
					</div>
				</div>
				<?php } ?>
			</article>
		</div>
	</main>
<?php
	$output = ob_get_clean(); //End output buffering

	include 'header.php';
	echo $output; //Echo output buffering (whole HTML)
	include 'footer.php';

	// $script_end_time = microtime(true);
	// print("Execution time:" . $script_end_time - $script_start_time . " seconds");