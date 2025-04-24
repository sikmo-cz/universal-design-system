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
		'class'                   => '',
		'id'                      => '',
		'attributes'              => array(),
		'size'          					=> '',
		'first_row_is_table_head' => false,
    'html_escape'             => true,
		'data'                    => array(),
	);
 
	$data 			= is_array( $data ) ? array_merge( $defaults, $data ) : $defaults; // Merge provided data with defaults
	$attributes = array(); //init
	$base_class = 'data-table';

	// Classes
	$extra_classes = $ComponentLoader->render_classes( $data["class"] );
	$attributes["class"] = !empty($extra_classes) ? $base_class . ' ' . $extra_classes : $base_class;

	// Class size
	if (in_array($data['size'], array("extrasmall", "small", "big"), true)) {
		$attributes["class"] .= " " . $base_class . "--" . $data['size'];
	}

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
	if (!is_array($data['data'])) throw new Exception('Data "data" must by type array.');

	$html_attributes = $ComponentLoader->render_attributes( $attributes );
?>
<div <?php echo $html_attributes ?>>
	<table>
		<?php
    $i = 0;
    foreach ($data['data'] as $table_row) {
      echo '<tr>';

      foreach ($table_row as $rokey => $table_cell) {
        echo ($data['first_row_is_table_head'] && $i === 0 ? '<th>' : '<td>');
          echo ($data['html_escape'] ? esc_html($table_cell) : $table_cell);
        echo ($data['first_row_is_table_head'] && $i === 0 ? '</th>' : '</td>');
      }
      
      echo '</tr>';
	  //TODO: Martin 
		/*
	  ?>
		<tr>
			<td colspan="999">
				<div class="style-card">
				Tududu
				</div>	
			</td>
		</tr>
	  <?php
*/
      $i++;
    }
    ?>
	</table>
</div>