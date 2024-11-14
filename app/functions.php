<?php
	function slugify( string $string ) {
		// Remove non-alphanumeric characters, except for hyphens
		$string = preg_replace( '/[^a-zA-Z0-9- ]/', '', $string );
		$string = preg_replace( '/\s+/', ' ', $string );
		$string = str_replace( ' ', '-', $string );
    
		// return in lowercase
		return strtolower( $string );
	}

	function component_list() {
		return array(
			'Typography', 'Colors', 'Styles',
			'-',
			'Buttons', 'Pagination', 'Tabs', 'Vertical menu', 'Checkboxes & Radio buttons', 'Toggle', 'Menu items',
			'-',
			'Inputs', 'Avatars', 'Chips', 'Tables', 'Breadcrumbs', 'Button group', 'Stepper / Progress', 'Accordions',
			'-',
			'Icons', 'Flags', 'Helper',
		);
	}

	function current_component_page() {
		// Remove leading/trailing slashes and split the URI by '/'
		$segments = explode( '/', trim( $_SERVER[ 'REQUEST_URI' ], '/' ) );
		
		// Match only allowed characters (alphanumeric, hyphen, underscore)
		if ( preg_match( '/^[a-zA-Z0-9_-]+$/', $segments[0] ) ) {
			return $segments[0];
		}
		
		return 'typography'; // Return default
	}