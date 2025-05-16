<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );

	$ComponentLoader->register_js( 'easepick.min' );
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
		'size'          => '',
		'label'         => '',
		'name'          => '',
		'value'         => '',
		'input_attributes' => array(),
		'icon'          => '',
		'helper_text'   => '',
		'helper_type'   => '',
	);

	$data = is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults

	/*
		=============================
		===			SPECIFIC DATA			===
		=============================
	*/


	//Checks
  if (!is_bool($data['date_range'])) throw new Exception('Data "date_range" must by type boolean.');
	if (!is_string($data['date_min'])) throw new Exception('Data "date_min" must by type string.');
  if (!is_string($data['date_max'])) throw new Exception('Data "date_max" must by type string.');
  if (!is_string($data['date_start'])) throw new Exception('Data "date_start" must by type string.');
  if (!is_string($data['date_end'])) throw new Exception('Data "date_end" must by type string.');

  $input_date_attributes = array();

  $input_date_attributes["class"] = "datepicker";

  if ($data['date_range']) {
    $input_date_attributes["data-range"] = "true";
  }

  if (!empty($data['date_min'])) {
    $input_date_attributes["data-min-date"] = $data['date_min'];
  }

  if (!empty($data['date_max'])) {
    $input_date_attributes["data-max-date"] = $data['date_max'];
  }

  if (!empty($data['date_start'])) {
    $input_date_attributes["data-start-date"] = $data['date_start'];
  }

  if (!empty($data['date_end'])) {
    $input_date_attributes["data-end-date"] = $data['date_end'];
  }

  $input_attributes = array_merge($data['input_attributes'], $input_date_attributes);
?>
<?php
$ComponentLoader->load( 'input/text', array(
	'class'         => $data["class"],
	'id'            => $data["id"],
	'attributes'    => $data["attributes"],
	'size'          => $data["size"],
	'label'         => $data["label"],
	'name'          => $data["name"],
  'value'         => $data["value"],
  'input_attributes' => $input_attributes,
	'icon'         	=> $data["icon"],
	'helper_text'   => $data["helper_text"],
	'helper_type'   => $data["helper_type"],
) );
?>