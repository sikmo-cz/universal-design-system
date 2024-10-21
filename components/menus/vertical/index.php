<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );


	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'menus-vertical';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
<nav class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
		<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
		<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
	>
	<?php if ( isset( $data['caption'] ) ) { ?>
		<p><?php echo $data['caption']; ?></p>
	<?php } ?>

	<ul>
		<?php foreach (  $data['items']  as $key => $item) {
			?> 
				<li <?php if ( isset( $item['active'] )) { echo 'class="active"'; } ?>>
					<a href="<?php echo $item['href']; ?>">
						<?php echo $item['text']; ?>
					</a>
					<?php if ( isset( $item['subItems'] )) { ?>
					<ul>
						<?php foreach (  $item['subItems']  as $key => $sub_item) { 	?> 
									<li <?php if ( isset( $sub_item['active'] )) { echo 'class="active"'; } ?>>
										<a href="<?php echo $sub_item['href']; ?>">
											<?php echo $sub_item['text']; ?>
										</a>
									</li>
						<?php } ?>	
					</ul>
					<?php } ?>	
				</li>
			<?php
		}
		?>
	</ul>
</nav>