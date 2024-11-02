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

	$base_class = 'data-table data-table--small';
?>
<div class="<?php echo $base_class; ?>">
	<table class="<?php echo $base_class; ?>">
		<tr>
			<th>Created by</th>
			<th>Date</th>
			<th>Assigned</th>
			<th>State</th>
			<th>Actions</th>
		</tr>
		<tr>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
		</tr>
		<tr>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
		</tr>
		<tr>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
			<td>Data</td>
		</tr>
	</table>
</div>