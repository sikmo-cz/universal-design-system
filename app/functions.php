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

	function esc_html($string) {
		return htmlspecialchars($string); //TODO make it better
	}

	function esc_attr($string) {
		return $string;
	}