<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       finapp
 * @since      1.0.0
 *
 * @package    Finapp
 * @subpackage Finapp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Finapp
 * @subpackage Finapp/public
 * @author     finapp <mabadejedaniel1@gmail.com>
 */
class Finapp_Public {

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
		 * defined in Finapp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Finapp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/finapp-public.css', array(), $this->version, 'all' );

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
		 * defined in Finapp_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Finapp_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/finapp-public.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( "bootsrap", plugin_dir_url( __FILE__ ) . 'js/lib/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false);

		// wp_enqueue_script( "ionicons", plugin_dir_url( __FILE__ ) . 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( "splide", plugin_dir_url( __FILE__ ) . 'js/plugins/splide/splide.min.js', array( 'jquery' ), $this->version, false );

		// wp_enqueue_script( "base", plugin_dir_url( __FILE__ ) . 'js/base.js', array( 'jquery' ), $this->version, false );

	}

}
