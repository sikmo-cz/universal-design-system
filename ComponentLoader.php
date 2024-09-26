<?php

	define('ABSPATH', __DIR__);  // Define the absolute base path

	class ComponentLoader {
		private static $instance 	= null; // Singleton instance
		private $base_path 			= ''; // Base path for components
		private $css_files 			= array(); // Registered CSS files
		private $js_files 			= array();  // Registered JS files
		private $current_component 	= ''; // To store the currently loaded component

		// Private constructor to prevent direct instantiation
		private function __construct() {
			$this->base_path = rtrim( ABSPATH, '/' ); // Set base path
		}

		/**
		 * Get the singleton instance of the ComponentLoader.
		 * Initializes the instance if it doesn't exist.
		 * @return ComponentLoader The single instance of ComponentLoader.
		 */
		public static function get_instance() {
			if (self::$instance === null) {
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
		public function load($component_path, $args = [], $demo = false) {
			$full_path = "{$this->base_path}/components/{$component_path}/index.php";

			if ( ! file_exists( $full_path ) ) {
				return false; // Return false if the file doesn't exist
			}

			if ($demo) {
				include str_replace('index.php', 'data.php', $full_path); // Load demo data
			}

			$this->current_component = $component_path; // Save the current component

			// Include the component with $args
			include $full_path;
			return true;
		}

		/**
		 * Registers a CSS file automatically based on the component's folder structure.
		 * @param string $css_file The name of the CSS file (e.g., 'style').
		 */
		public function register_css($css_file) {
			$css_path = "/components/{$this->current_component}/css/{$css_file}.css";

			if (file_exists($this->base_path . $css_path)) {
				$this->css_files[] = $css_path;
			}
		}

		/**
		 * Registers a JS file automatically based on the component's folder structure.
		 * @param string $js_file The name of the JS file (e.g., 'script').
		 */
		public function register_js($js_file) {
			$js_path = "/components/{$this->current_component}/js/{$js_file}.js";

			if (file_exists($this->base_path . $js_path)) {
				$this->js_files[] = $js_path;
			}
		}

		/**
		 * Outputs all registered CSS files.
		 */
		public function output_css() {
			foreach ($this->css_files as $css_file) {
				echo '<link rel="stylesheet" href="' . $css_file . '">' . PHP_EOL;
			}
		}

		/**
		 * Outputs all registered JS files.
		 */
		public function output_js() {
			foreach ($this->js_files as $js_file) {
				echo '<script src="' . $js_file . '"></script>' . PHP_EOL;
			}
		}
	}