<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	
	$ComponentLoader->preload( 'forms/base-input' );
	
	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'forms-date';

?>
<input type="text" id="datepicker"/>
<script>document.addEventListener("DOMContentLoaded", function(event) {

var picker = new Lightpick({
    field: document.getElementById('datepicker'),
    singleDate: false,

    minDate: moment().startOf('month').add(7, 'day'),
    maxDate: moment().endOf('month').subtract(7, 'day'),
    onSelect: function(start, end){
        var str = '';
        str += start ? start.format('Do MMMM YYYY') + ' to ' : '';
        str += end ? end.format('Do MMMM YYYY') : '...';
        document.getElementById('result-6').innerHTML = str;
    }
});
});
</script>