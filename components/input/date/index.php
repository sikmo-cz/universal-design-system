<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );

	$ComponentLoader->register_js( 'moment.min' );
    $ComponentLoader->register_js( 'easepick.min' );
	$ComponentLoader->register_js( 'script' );

	
	$ComponentLoader->preload( 'forms/base-input' );
	
	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'forms-date';

?>
    <input id="datepicker"/>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

const picker = new easepick.create({
    element: "#datepicker",
    css: [
        "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css"
    ],
    zIndex: 10,
    autoApply: false,
    RangePlugin: {
        repick: true
    },
    plugins: [
        "RangePlugin"
    ]
});
});
    </script>
