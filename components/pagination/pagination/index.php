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

	$base_class = 'pagination-pagination';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
	<ul class="<?php echo $base_class; ?> <?php echo isset($data['class']) ? $data['class'] : ''; ?>"
		<?php echo isset($data['id']) ? "id='" . $data['id'] . "'" : ''; ?>
		<?php echo isset($data['extra-attr']) ? $data['extra-attr'] : ''; ?>
	>
		<?php
		if( !isset( $data['items'][0]['active'] ) ) { ?> 
			<li class="<?php echo $base_class; ?>__prev"><a href="<?php echo $data['prev-href']; ?>"></a></li>
		<?php } ?>
		
		<?php foreach (  $data['items']  as $key => $item) {
			?> 
				<li <?php if ( isset( $item['active'] )) { echo 'class="active"'; } ?>>
					<a href="<?php echo $item['href']; ?>">
						<?php echo $item['text']; ?>
					</a>
				</li>
			<?php
		}
		?>
		<?php if ( !isset(end($data['items'])['active'])){ ?> 
			<li class="<?php echo $base_class; ?>__next"><a href="<?php echo $data['next-href']; ?>"></a></li>
		<?php } ?>
	</ul>
</div>