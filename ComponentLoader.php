<?php declare( strict_types = 1 );

	/**
	 * ComponentLoader Class
	 * 
	 * A singleton class responsible for loading, managing and rendering UI components.
	 * Handles component dependencies, asset registration (CSS/JS), and SVG icon management.
	 * 
	 * @since 1.0.0
	 */

	class ComponentLoader 
	{
		/** @var string Version of the ComponentLoader */
		private static $version = '1.0.7';

		/** @var ComponentLoader|null Singleton instance of the class */
		private static $instance = null; 

		/** @var string Base uri */
		private static $base_uri = '';

		/** @var string Base file system path for component operations */
		private $base_path = '';
		
		/** @var array Array of registered CSS file paths */
		private $css_files = array();
		
		/** @var array Array of registered JavaScript file paths */
		private $js_files = array();

		/** @var string Currently active component being processed */
		private $current_component = '';
		
		/** @var bool Flag indicating if dependencies are being loaded */
		private $dependece_loading = false;

		/**
		 * Private constructor to enforce singleton pattern
		 * Sets the base path for component operations using the current directory
		 */
		private function __construct() 
		{
			$this->base_path = rtrim( __DIR__, '/' ); // Define the absolute base path
		}

		/**
		 * Get the singleton instance of the ComponentLoader.
		 * Initializes the instance if it doesn't exist.
		 * 
		 * @return ComponentLoader The single instance of ComponentLoader.
		 */
		public static function get_instance($app_root_path = '') 
		{
			if (self::$instance === null) 
			{
				self::$instance = new ComponentLoader();

				//set base uri
				if (empty($app_root_path)) $app_root_path = __DIR__;
				$base_uri = str_replace($app_root_path, "", __DIR__); //difference from this instance class

				self::$base_uri = $base_uri;
			}

			return self::$instance;
		}

		/**
		 * Loads a component and passes arguments to it.
		 * 
		 * @param string $component_path The relative path to the component.
		 * @param array $args The arguments to pass to the component.
		 * @param bool $demo Whether to load demo data.
		 * @return bool Returns false if the component does not exist.
		 */
		public function load( string $component_path, array $args = [], bool $demo = false ) 
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


		/**
		 * Return URI folder for the design system root
		 *
		 * @return string URI
		 */
		public function get_design_system_folder_path() 
		{
			return $this->base_path;
		}

		/**
		 * Return URI folder for the design system root
		 *
		 * @return string URI
		 */
		public function get_design_system_folder_uri() 
		{
			return self::$base_uri;
		}
		
		/**
		 * Return URI folder for current component
		 *
		 * @return string URI
		 */
		public function get_component_folder_uri() 
		{
			return self::$base_uri . "/components/{$this->current_component}";
		}

		/**
		 * Registers a CSS file for the current component
		 * 
		 * @param string $css_file Name of the CSS file without extension
		 */
		public function register_css( string $css_file ) 
		{
			$css_path = $this->get_component_folder_uri() . "/dist/{$css_file}.css";

			if ( ! in_array( $css_path, $this->css_files ) ) 
			{
				$this->css_files[] = $css_path;
			}
			
			/* if (file_exists($this->base_path . $css_path)) {
				$this->css_files[] = $css_path;
			} */
		}

		/**
		 * Registers a JavaScript file for the current component
		 * 
		 * @param string $js_file Name of the JavaScript file without extension
		 */
		public function register_js( string $js_file ) 
		{
			$js_path = $this->get_component_folder_uri() . "/js/{$js_file}.js";

			if( ! in_array( $js_path, $this->js_files ) ) 
			{
				$this->js_files[] = $js_path;
			}			

			/* if ( file_exists( $this->base_path . $js_path ) ) {
				$this->js_files[] = $js_path;
			} */
		}

		/**
		 * Outputs HTML link tags for all registered CSS files
		 */
		public function output_css() 
		{
			foreach ( (array) $this->css_files as $css_file) 
			{
				echo '<link rel="stylesheet" href="' . $css_file . '?v='. self::$version .'">' . PHP_EOL;
			}
		}

		/**
		 * Outputs HTML link tags for all registered JavaScript files
		 */
		public function output_js() 
		{
			foreach ( (array) $this->js_files as $js_file) 
			{
				echo '<script src="' . $js_file . '?v='. self::$version .'"></script>' . PHP_EOL;
			}
		}

		/**
		 * Converts an array of attributes into HTML attribute string
		 * 
		 * @param array $attributes Array of attribute key-value pairs
		 * @return string HTML-safe attribute string
		 */
		public function render_attributes( array $attributes = array() ) 
		{
			$attr_strings = array();

			foreach ( (array) $attributes as $key => $value ) 
			{
				$attr_strings[] = htmlspecialchars( $key ) . '="' . htmlspecialchars( $value ) . '"';
			}

			return implode( ' ', $attr_strings );
		}

		
		/**
		 * Convert an array of classes to string separated by a space
		 *
		 * @param  array|string $classes
		 * @return string
		 */
		public function render_classes( array|string $classes = array() ) {
			if (is_array($classes)) {
				return implode(" ", $classes);
			}

			return trim($classes);
		}

		/**
		 * Retrieves a list of available icons from a specified icon set
		 * 
		 * @param string $icon_set Name of the icon set directory
		 * @return array Associative array of icon names and their paths
		 */
		public function get_list_of_icons( string $icon_set ) 
		{
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

		/**
		 * Processes and combines SVG icons into a sprite file
		 * Triggered by GET parameter 'prepare_icon_set'
		 * 
		 * @return bool False if invalid icon set specified
		 */
		public function maybe_prepare_icon_set() 
		{
			$icon_set = $_GET[ 'prepare_icon_set' ] ?? false;

			if( ! in_array( $icon_set, array( 'icons', 'flags' ) ) ) {
				return false;
			}

			$sizes = array(
				'icons' => array( 24, 24 ),
				'flags' => array( 28, 20 ),
			);

			$width = $sizes[ $icon_set ][0];
			$height = $sizes[ $icon_set ][1];

			$icons_source_dir 	= $this->base_path . '/src/assets/' . $icon_set;
			$icons_dist_file 	= $this->base_path . '/dist/images/'. $icon_set .'-sprite.svg';
			$icons_dist_file_s 	= $this->base_path . '/dist/images/'. $icon_set .'-sprite-symbols.svg';

			$sprite_content 	= '<?xml version="1.0" encoding="utf-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 '. $width .' '. $height .'"><defs><style>g{display: none;}g:target{display: inline;}</style></defs>';

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

				if( $icon_set == 'icons' ) {
					$svg_content = str_replace( 'fill="black"', 'fill="currentColor"', $svg_content ); // Remove all newline characters
				}
			
				// Add cleaned-up SVG content to sprite
				$sprite_content .= '<g id="'. $file_id .'" viewBox="0 0 '. $width .' '. $height .'">'. $svg_content .'</g>';
			}
			
			$sprite_content .= "</svg>";
			$sprite_content_s = str_replace( array( '<g ', '</g>' ), array( '<symbol ', '</symbol>' ), $sprite_content );
			
			file_put_contents( $icons_dist_file, $sprite_content );
			file_put_contents( $icons_dist_file_s, $sprite_content_s );
		}
	}

	/**
	 * Helper function to get ComponentLoader instance
	 * 
	 * @return ComponentLoader Singleton instance of ComponentLoader
	 */
	function ComponentLoader($app_root_path = '')
	{
		return ComponentLoader::get_instance( $app_root_path );
	}

	if (!function_exists('esc_html')) {
		function esc_html($string) {
			if (is_int($string) || is_float($string)) {
				return $string;
			}

			return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
		}
	}

	if (!function_exists('esc_attr')) {
		function esc_attr($string) {
			if (is_int($string) || is_float($string)) {
				return $string;
			}

			return htmlspecialchars( $string, ENT_QUOTES | ENT_HTML5, 'UTF-8', false );
		}
	}

	if (!function_exists('__')) {
		function __($string, $domain = '') {
			return $string;
		}
	}