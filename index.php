<?php

	include 'ComponentLoader.php';

	// Get the singleton instance of ComponentLoader
	$CL = ComponentLoader();

	// maybe prepare icon set
	$CL->maybe_prepare_icon_set( 'icons' );
	$CL->maybe_prepare_icon_set( 'flags' );

	// testing app
	include ( $_GET[ 'dev' ] ?? false ) ? './app/test.php' : './app/index.php';