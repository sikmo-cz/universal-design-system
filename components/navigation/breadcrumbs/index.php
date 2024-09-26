<?php

	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Preload dependencies
	$ComponentLoader->prepare_dependencies([
		'test'
	]);

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}
?>
<div class="breadcrumbs">
    <ul>
        <?php foreach ((array) $data['list'] as $index => $item) { ?>
        <li>
            <a href="#" target="<?php echo isset($item['target']) ? $item['target'] : ''; ?>">
                <?php echo $item['title']; ?>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>