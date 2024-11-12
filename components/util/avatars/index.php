<?php
	// Get the singleton instance of ComponentLoader
	$ComponentLoader = ComponentLoader();

	// Register CSS/JS for this component (no need to specify full path)
	$ComponentLoader->register_css( 'style' );
	$ComponentLoader->register_js( 'script' );

	// Preload dependencies
	$ComponentLoader->preload( 'util/avatar' );

	// Load the data ($args or $demo_data)
	$data = $demo ? $demo_data : $args;
	if ( empty( $data ) ) {
		return false; // Bail if no data
	}

	$base_class = 'util-avatars'; //util-avatars--small //util-avatars--big 
?>
<ul class="<?php echo $base_class; ?>">
	<?php
		for( $i = 0; $i < 5; $i++ ) {
			echo "<li>";
			$ComponentLoader->load( 'util/avatar', [], true );
			echo "</li>";
		}
	?>
	<li>
		<?php $ComponentLoader->load( 'util/avatar', array(
			//Globals
			'class'         => 'example-class example-class-2', //(string|array default:'') extra classes separated by a space OR classes in array
			'id'            => 'id-avatar', //(string default:'')
			'attributes'    => array("data-example" => "true"), //(array default:array()) Array with extra attributes
			'size'          => '', //(string default:'') small / big / ''

			//Specific
			'href'          => '', //(string default:'')
			'text'          => '+30', //(string default:'')
			'image'         => '', //(string default:'')
			) ); 
		?>
		<p>
			Text těch<br>
			+30<br>
			tu<br>
			pak<br>
			se<br>
			to<br>
			ještě<br>
			domyslí<br>
		</p>
	</li>
</ul>


