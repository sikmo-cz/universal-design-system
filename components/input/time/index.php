<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload any components that this component relies on
	$ComponentLoader->preload( 'input/select' );
	
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
		'size'          => '',
		'label'         => '',
		'name'          => '',
		'input_attributes' => array(),
		'helper_text'   => '',
		'helper_type'   => '',
		'time_from'     => 0,
		'time_to'       => 1439,
		'time_gap'      => 15,
	);

	$data = is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults

	/*
		=============================
		===			SPECIFIC DATA			===
		=============================
	*/

	//Checks
	if (!is_int($data['time_from'])) throw new Exception('Data "time_from" must by type integer.');
	if (!is_int($data['time_to'])) throw new Exception('Data "time_to" must by type integer.');
	if (!is_int($data['time_gap'])) throw new Exception('Data "time_gap" must by type integer.');

	$generated_times = array();
	for ($i = $data["time_from"]; $i <= $data["time_to"]; $i = $i + $data["time_gap"]) {
		$hours_decimal = $i / 60;
		$hours = floor($hours_decimal);
		$minutes = ($hours_decimal - $hours) * 60;

		// Format hours to ensure two digits
		$hours = str_pad(round($hours), 2, "0", STR_PAD_LEFT);

		// Format minutes to ensure two digits
    $minutes = str_pad(round($minutes), 2, "0", STR_PAD_LEFT);

		$generated_times[] = array(
			"value" => $hours . ":" . $minutes,
			"text" => $hours . ":" . $minutes,
		);
	}
?>

<?php
$ComponentLoader->load( 'input/select', array(
	'class'         => $data["class"],
	'id'            => $data["id"],
	'attributes'    => $data["attributes"],
	'size'          => $data["size"],
	'label'         => $data["label"],
	'name'          => $data["name"],
	'input_attributes' => $data["input_attributes"],
	'helper_text'   => $data["helper_text"],
	'helper_type'   => $data["helper_type"],
	'search'        => true,
	'multiple'      => false,
	'options'       => $generated_times,
));
?>
