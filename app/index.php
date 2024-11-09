<?php

	// Load the ComponentLoader class
	include 'functions.php';
	include './../ComponentLoader.php';

	// Get the singleton instance of ComponentLoader
	$CL = ComponentLoader();

	// maybe prepare icon set
	$CL->maybe_prepare_icon_set( 'icons' );
	$CL->maybe_prepare_icon_set( 'flags' );

	// testing app
	include ( $_GET[ 'cm' ] ?? false ) ? 'components.php' : 'test.php';