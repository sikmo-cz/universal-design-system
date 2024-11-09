<?php

	function slugify( string $string ) {
		// Remove non-alphanumeric characters, except for hyphens
		$string = str_replace( ' ', '-', $string );
		$string = preg_replace( '/[^a-zA-Z0-9-]/', '', $string );
    
		// return in lowercase
		return strtolower( $string );
	}