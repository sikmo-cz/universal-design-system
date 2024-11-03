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
        'type' 			=> 'button', // Default type is 'button'
        'button_type' 	=> 'button', // Default button type
        'href' 			=> '#', // Default href for links
        'icon_before' 	=> '', // No icon before by default
        'icon_after' 	=> '', // No icon after by default
        'size' 			=> 'medium', // Default size
        'content' 		=> 'Button', // Default content
        'class' 		=> '', // No custom class by default
        'attributes' 	=> array(), // No additional attributes by default
    );

	$base_class = 'buttons-base';

	// Merge provided data with defaults
    $data = is_array( $data ) ? array_merge( $defaults, $data ) : $defaults;

	// Validation: Ensure 'type' is either 'button' or 'link'
    if ( ! in_array( $data[ 'type' ], array( 'button', 'link' ) ) ) {
        $data[ 'type' ] = $defaults[ 'type' ];
    }

    // Validation: Ensure 'size' is one of the allowed sizes
    if ( ! in_array( $data[ 'size' ], array( 'small', 'medium', 'large' ) ) ) {
        $data[ 'size' ] = $defaults[ 'size' ];
    }

	// Class for the component
    $classes = array( 'buttons-base', "{$base_class}--{$data['size']}" );
	// $type_class = "primary, secondary, tertiary"; TODO: @jan

	// Add custom classes if provided
    if ( ! empty( $data[ 'class' ] ) ) {
        $classes[] = $data[ 'class' ];
    }

    // Prepare attributes
    $attributes = array( 'class' => implode( ' ', $classes ) );

	// Add icon attributes if provided
    if ( ! empty( $data[ 'icon_before' ] ) ) {
        $attributes[ 'data-icon-before' ] = $data[ 'icon_before' ];
    }
    if ( ! empty( $data[ 'icon_after' ] ) ) {
        $attributes[ 'data-icon-after' ] = $data[ 'icon_after' ];
    }

	// Merge additional attributes
    if ( is_array( $data[ 'attributes' ] ) ) {
        $attributes = array_merge( $attributes, $data[ 'attributes' ] );
    }

	// Add 'href' or 'type' attribute based on the component type
	if( $data['type'] === 'button' ) $attributes[ 'type' ] = $data[ 'button_type' ];	
	if( $data['type'] === 'link' ) $attributes[ 'href' ] = $data[ 'href' ];

	// Determine the tag name based on the 'type'
    $tag = ( $data['type'] === 'link' ) ? 'a' : 'button';
?>
<<?php echo $tag; ?> <?php echo $ComponentLoader->render_attributes( $attributes ); ?>>
	<?php echo $data[ 'content' ]; ?>
</<?php echo $tag; ?>>