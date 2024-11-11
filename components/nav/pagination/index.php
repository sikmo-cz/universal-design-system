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

	// Default values
	$defaults = array(
		'class'         => '',
		'id'            => '',
		'attributes'    => array(),
		'url'           => '?page=%d',
		'pages'         => 0,
		'page_current'  => 0,
		'size'          => '',
		'range'         => 2,
		'show_arrows'   => true,
	);

	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'nav-pagination';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Id
	if (!empty($data["id"])) $attributes["id"] = strval( $data["id"] );

	// Attributes
	if ( is_array( $data[ 'attributes' ] ) ) {
		$attributes = array_merge( $attributes, $data[ 'attributes' ] );
	}

	/*
		=============================
		===			SPECIFIC DATA			===
		=============================
	*/

	//Checks
	if (!is_string($data['url']))																			throw new Exception('Data "url" must by type string.');
	if (!is_int($data['pages']) OR $data['pages'] < 0)								throw new Exception('Data "pages" must by type integer and greater than 0.');
	if (!is_int($data['page_current']) OR $data['page_current'] < 0)	throw new Exception('Data "page_current" must by type integer and greater than 0.');
	if (!is_string($data['size']))																		throw new Exception('Data "size" must by type string.');
	if (!is_int($data['range']) OR $data['range'] < 0)								throw new Exception('Data "range" must by type integer and greater than 0.');
	if (!is_bool($data['show_arrows']))																throw new Exception('Data "show_arrows" must by type boolean.');

	if( $data['size'] === 'small' ) {
		$attributes["class"] .= $base_class . "--small";
	}

	//Prepare pagination
	$pagination = [];

	// Always show the first page if the current page is greater than 1
	if ($data['page_current'] >= 1) {
		$pagination[] = 1;
	}

	// Show ellipsis after the first page if there’s a gap
	if ($data['page_current'] > $data['range'] + 2) {
		$pagination[] = '...';
	}

  // Display pages within range of the current page
  for ($i = max(1, $data['page_current'] - $data['range']); $i <= min($data['pages'], $data['page_current'] + $data['range']); $i++) {
		if ($i != 1 && $i != $data['pages']) { // Avoid duplicating first and last pages
			$pagination[] = $i;
		}
	}

  // Show ellipsis before the last page if there’s a gap
  if ($data['page_current'] < $data['pages'] - $data['range'] - 1) {
		$pagination[] = '...';
	}

  // Always show the last page if the current page is less than the total pages
  if ($data['page_current'] <= $data['pages']) {
		$pagination[] = $data['pages'];
	}
?>
<ul <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php
	$prev_page = $data['page_current'] - 1;
	if ($data['show_arrows'] AND $prev_page > 0) {
	?>
		<li class="<?php echo $base_class; ?>__prev"><a href="<?php echo sprintf($data['url'], $prev_page) ?>">back</a></li>
	<?php
	}

	foreach ($pagination as $page) {
	?> 
		<li<?php if ($page == $data['page_current']) echo ' class="active"'; elseif ($page == '...') echo ' class="dots"';?>>
			<?php if (is_int($page)) { ?>
			<a href="<?php echo sprintf($data['url'], $page) ?>">
			<?php } ?>
				<?php echo $page ?>
			<?php if (is_int($page)) { ?>
			</a>
			<?php } ?>
		</li>
	<?php
	}

	$next_page = $data['page_current'] + 1;
	if ($data['show_arrows'] AND $next_page <= $data['pages']) {
	?>
		<li class="<?php echo $base_class; ?>__prev"><a href="<?php echo sprintf($data['url'], $next_page) ?>">next</a></li>
	<?php
	}
	?>
</ul>
