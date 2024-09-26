<?php

	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	// Register CSS for this component (no need to specify full path)
	$ComponentLoader->register_css('style');
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