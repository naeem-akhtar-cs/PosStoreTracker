<?php

require_once(__DIR__ . './../includes/PosStoreTracker/PosStoreTracker.php');
require_once(__DIR__ . './../includes/PosStoreTracker/PosStoreTrackerShortCode.php');

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/naeem-akhtar-cs/
 * @since      1.0.0
 *
 * @package    Poststoretracker
 * @subpackage Poststoretracker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Poststoretracker
 * @subpackage Poststoretracker/public
 * @author     Naeem Akhtar <naeem.akhtar.cs@gmail.com>
 */
class Poststoretracker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Poststoretracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Poststoretracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/poststoretracker-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Poststoretracker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Poststoretracker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/poststoretracker-public.js', array( 'jquery' ), $this->version, false );

	}


	public function trackParcelApi()
	{
		register_rest_route(
			'trackParcel',
			'/(?P<parcelId>[a-zA-Z0-9-]+)',
			array(
				'methods' => 'GET',
				'callback' => 'trackPosStoreParcel',
			)
		);
	}

	public function registerTrackerShortCode()
	{
		add_shortcode('PosStoreTracker', 'posStoreTrackerShortCode');
	}

}
