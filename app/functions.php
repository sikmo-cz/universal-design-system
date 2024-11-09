<?php

	function slugify( string $string ) {
		// Remove non-alphanumeric characters, except for hyphens
		$string = preg_replace( '/[^a-zA-Z0-9- ]/', '', $string );
		$string = preg_replace( '/\s+/', ' ', $string );
		$string = str_replace( ' ', '-', $string );
    
		// return in lowercase
		return strtolower( $string );
	}