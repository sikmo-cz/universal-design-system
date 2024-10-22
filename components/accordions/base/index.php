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

	$base_class = 'accordions-base';

	if( isset( $data['size'] ) && $data['size'] == 'small' ) {
		$data['class'] .= "{$base_class}--small";
	}

?>
<ul>
	<li>
		<details>
			<summary>Lorem ipsum dolor sit amet consectetur, adipisicing elit</summary>
			<p>
				Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?
			</p>
		</details>
	</li>
	<li>
		<details>
			<summary>Lorem ipsum dolor sit amet consectetur, adipisicing elit</summary>
			<p>
				Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?
			</p>
		</details>
	</li>
	<li>
		<details>
			<summary>Lorem ipsum dolor sit amet consectetur, adipisicing elit</summary>
			<p>
				Soluta debitis deserunt obcaecati distinctio illo qui doloremque corrupti odit hic ipsam quos in assumenda, a officia asperiores recusandae, facilis quis nam?
			</p>
		</details>
	</li>
</ul>
