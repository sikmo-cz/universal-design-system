<?php

	class ComponentLoader 
	{
		private static $instance 	= null; // Singleton instance
		private $base_path 			= ''; // Base path for components
		private $css_files 			= array(); // Registered CSS files
		private $js_files 			= array();  // Registered JS files

		private $current_component 	= ''; // To store the currently loaded component
		private $dependece_loading 	= false; // To store the currently loaded component

		// Private constructor to prevent direct instantiation
		private function __construct() 
		{
			$this->base_path = rtrim( __DIR__, '/' ); // Define the absolute base path
		}

		/**
		 * Get the singleton instance of the ComponentLoader.
		 * Initializes the instance if it doesn't exist.
		 * @return ComponentLoader The single instance of ComponentLoader.
		 */
		public static function get_instance() 
		{
			if (self::$instance === null) 
			{
				self::$instance = new ComponentLoader();
			}

			return self::$instance;
		}

		/**
		 * Loads a component and passes arguments to it.
		 * @param string $component_path The relative path to the component.
		 * @param array $args The arguments to pass to the component.
		 * @param bool $demo Whether to load demo data.
		 * @return bool Returns false if the component does not exist.
		 */
		public function load( $component_path, $args = [], $demo = false ) 
		{
			$full_path = "{$this->base_path}/components/{$component_path}/index.php";

			if ( ! file_exists( $full_path ) ) 
			{
				return false; // Return false if the file doesn't exist
			}

			if ( $demo ) 
			{
				include str_replace('index.php', 'data.php', $full_path); // Load demo data
			}

			if( $this->dependece_loading ) 
			{
				$real_current_component = $this->current_component;
			}

			$this->current_component = $component_path; // Save the current component

			// Include the component with $args
			include $full_path;

			if( $this->dependece_loading ) 
			{
				$this->current_component = $real_current_component; // Save the current component
			}

			return true;
		}

		public function preload( $component_path ) 
		{
			$this->load( $component_path );
		}

		public function prepare_dependencies( $dependence_list ) 
		{
			foreach( (array) $dependence_list as $component_path ) 
			{
				$this->dependece_loading = true;
				$this->preload( $component_path );
			}

			$this->dependece_loading = false;
		}

		/**
		 * Registers a CSS file automatically based on the component's folder structure.
		 * @param string $css_file The name of the CSS file (e.g., 'style').
		 */
		public function register_css($css_file) 
		{
			$css_path = "/components/{$this->current_component}/dist/{$css_file}.css";

			if ( ! in_array( $css_path, $this->css_files ) ) 
			{
				$this->css_files[] = $css_path;
			}
			
			/* if (file_exists($this->base_path . $css_path)) {
				$this->css_files[] = $css_path;
			} */
		}

		/**
		 * Registers a JS file automatically based on the component's folder structure.
		 * @param string $js_file The name of the JS file (e.g., 'script').
		 */
		public function register_js($js_file) 
		{
			$js_path = "/components/{$this->current_component}/js/{$js_file}.js";

			if( ! in_array( $js_path, $this->js_files ) ) 
			{
				$this->js_files[] = $js_path;
			}			

			/* if ( file_exists( $this->base_path . $js_path ) ) {
				$this->js_files[] = $js_path;
			} */
		}

		/**
		 * Outputs all registered CSS files.
		 */
		public function output_css() 
		{
			foreach ( (array) $this->css_files as $css_file) 
			{
				echo '<link rel="stylesheet" href="' . $css_file . '">' . PHP_EOL;
			}
		}

		/**
		 * Outputs all registered JS files.
		 */
		public function output_js() 
		{
			foreach ( (array) $this->js_files as $js_file) 
			{
				echo '<script src="' . $js_file . '"></script>' . PHP_EOL;
			}
		}

		// Function to render HTML attributes from an array
		public function render_attributes( $attributes ) 
		{
			$attr_strings = array();

			foreach ( (array) $attributes as $key => $value ) 
			{
				$attr_strings[] = htmlspecialchars( $key ) . '="' . htmlspecialchars( $value ) . '"';
			}

			return implode( ' ', $attr_strings );
		}

		public function get_list_of_icons( $icon_set ) {
			$icons_source_dir 	= $this->base_path . '/src/assets/' . $icon_set; // Directory with SVG files
			$files 				= glob( $icons_source_dir . '/*.svg' );
			$files_validated 	= array();

			foreach ( (array) $files as $file ) 
			{
				$filename 		= pathinfo( $file, PATHINFO_FILENAME );
				$files_validated[ $filename ] = "/src/assets/{$icon_set}/{$filename}.svg";
			}

			return $files_validated;
		}

		public function maybe_prepare_icon_set() 
		{
			$icon_set = $_GET[ 'prepare_icon_set' ] ?? false;

			if( ! in_array( $icon_set, array( 'icons', 'flags' ) ) ) {
				return false;
			}

			$icons_source_dir 	= $this->base_path . '/src/assets/' . $icon_set; // Directory with SVG files
			$icons_dist_file 	= $this->base_path . '/dist/images/'. $icon_set .'-sprite.svg'; // Output sprite file
			$sprite_content 	= '<?xml version="1.0" encoding="utf-8"?><svg xmlns="http://www.w3.org/2000/svg"><defs><style>g{display: none;}g:target{display: inline;}</style></defs>';

			// Step 1: Load all SVG files in the directory
			$files = glob( $icons_source_dir . '/*.svg' );

			foreach ( (array) $files as $file ) 
			{
				$filename 		= pathinfo( $file, PATHINFO_FILENAME );
				$file_id		= strtolower( $filename );
				$svg_content 	= file_get_contents( $file );
			
				// Remove outer <svg> tags and add to sprite
				$svg_content = preg_replace( '/<svg[^>]*>|<\/svg>/', '', $svg_content );

				// Remove all <g> tags and their closing tags, but keep the content inside
				$svg_content = preg_replace( '/<\/?g[^>]*>/', '', $svg_content );

				// Remove <clipPath> and <defs> tags and their contents
				$svg_content = preg_replace( '/<defs>.*?<\/defs>/s', '', $svg_content );
				$svg_content = preg_replace( '/<clipPath[^>]*>.*?<\/clipPath>/s', '', $svg_content );
			
				// Minify SVG content (removing whitespace and comments)
				$svg_content = preg_replace('/\s{2,}/', ' ', $svg_content ); // Remove excess whitespace
				$svg_content = preg_replace('/<!--.*?-->/', '', $svg_content ); // Remove comments
				$svg_content = preg_replace('/\n/', '', $svg_content ); // Remove all newline characters
			
				// Add cleaned-up SVG content to sprite
				$sprite_content .= '<g id="'. $file_id .'">'. $svg_content .'</g>';
			}
			
			// Close the sprite file content
			$sprite_content .= "</svg>";
			
			// Step 4: Save sprite to output file
			file_put_contents( $icons_dist_file, $sprite_content );
		}
	}

	function ComponentLoader() 
	{
		return ComponentLoader::get_instance();
	}