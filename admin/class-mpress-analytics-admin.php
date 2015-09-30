<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.midwestdigitalmarketing.com
 * @since      1.0.0
 *
 * @package    Mpress_Analytics
 * @subpackage Mpress_Analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mpress_Analytics
 * @subpackage Mpress_Analytics/admin
 * @author     Midwest Digital Marketing <bob.moore@midwestdigitalmarketing.com>
 */
class Mpress_Analytics_Admin {

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
    private $settings_key;
    private $default_settings;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->settings_key = $this->plugin_name . '-settings';

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Mpress_Analytics_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Mpress_Analytics_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mpress-analytics-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Mpress_Analytics_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Mpress_Analytics_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mpress-analytics-admin.js', array( 'jquery' ), $this->version, false );

    }
    public function add_settings_page() {
        add_options_page(
            __( 'Google Analytics Settings' ), // Page title
            __( 'Google Analytics' ), // menu title
            'manage_options', // capabilities
            $this->settings_key, //menu-slug
            array( $this, 'display_settings_page' ) // callback function
        );
    }
    public function init_settings_defaults() {
        $this->default_settings = array(
                'type_flag' => array(
                    'type'  => 'radio',
                    'label' => 'Google Analytics Type',
                    'value' => 0,
                    'options' => array(
                        'Standard Tracking',
                        'Custom Tracking'
                    )
                ),
                'ua_code' => array(
                    'field_id' => 'ua-code',
                    'type'     => 'text',
                    'label'    => 'UA-XXXXXXX-XX',
                    'selector' => 1,
                    'value'    => null
                ),
                'script' => array(
                    'field_id' => 'custom-script',
                    'type'     => 'textarea',
                    'label'    => 'Custom Tracking Script',
                    'selector' => 0,
                    'value'    => null
                )
            );
    }
    public function init_settings() {
        if( get_option( $this->settings_key ) ) {

            $settings = get_option( $this->settings_key );
            foreach( $settings as $key => $setting ) {
                $this->settings[$key] = array_merge( $this->default_settings[$key], array_filter( $settings[$key], 'trim' ) );
            }
        } else {
            $this->settings = $this->default_settings;
        }
        $this->settings = array_merge( $this->default_settings, $this->settings );
    }
    public function display_settings_page() {
        include plugin_dir_path( __FILE__ ) . '/partials/mpress-analytics-settings-display.php';
    }
    public function settings_page_description() {
        include plugin_dir_path( __FILE__ ) . 'partials/mpress-analytics-settings-description.php';
    }
    public function settings_page_fields( $args ) {
        include plugin_dir_path( __FILE__ ) . 'partials/mpress-analytics-settings-fields.php';
    }
    public function register_settings() {
        // register_setting( $option_group, $option_name, $sanitize_callback );
        register_setting( $this->settings_key, $this->settings_key );
        // Add Section: add_settings_section( $id, $title, $callback, $page )
        add_settings_section( 'mpress_analytics_settings', 'Google Analytics Settings', array( $this, 'settings_page_description' ), $this->settings_key );
        foreach( $this->settings as $key => $setting ) {
            $setting['key'] = $key;
            // add_settings_field( $id, $title, $callback, $page, $section, $args );
            add_settings_field( $key, $setting['label'], array( $this, 'settings_page_fields' ), $this->settings_key, 'mpress_analytics_settings', $setting );
        }
    }

}
