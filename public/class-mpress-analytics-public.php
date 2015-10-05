<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.midwestdigitalmarketing.com
 * @since      1.0.0
 * @package    Mpress_Analytics
 * @subpackage Mpress_Analytics/public
 */

/**
 * The public-facing functionality of the plugin.
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mpress_Analytics
 * @subpackage Mpress_Analytics/public
 * @author     Midwest Digital Marketing <bob.moore@midwestdigitalmarketing.com>
 */
class Mpress_Analytics_Public {

    /**
     * The ID of this plugin.
     * @since    1.0.0
     * @access   private
     * @var      string
     */
    private $plugin_name;

    /**
     * The settings key to retrieve options from the database
     * @since    1.0.0
     * @access   private
     * @var      string
     */
    private $settings_key;

    /**
     * The version of this plugin.
     * @since    1.0.0
     * @access   private
     * @var      string
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     * @since    1.0.0
     * @param    string, $plugin_name, The name of the plugin.
     * @param    string, $version, The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name  = $plugin_name;
        $this->version      = $version;
        $this->settings_key = $this->plugin_name . '-settings';
    }

    /**
     * Get analytics options from database and call appropriate output function
     * @since    1.0.0
     */
    public function init_analytics() {
        $settings = get_option( $this->settings_key );
        if( $settings ) {
            if( isset( $settings['type_flag']['value'] ) ) {
                switch( $settings['type_flag']['value'] ) {
                    case 0 :
                        $this->output_standard_analytics( $settings );
                        break;
                    case 1 :
                        $this->output_custom_analytics( $settings );
                        break;
                    default :
                        break;
                } // end switch
            } // end if isset
        } // end if $settings
    } // end function

    /**
     * Output standard analytics
     * @since    1.0.0
     * @param    array, $settings, settings retrieved from database
     * @access   private
     */
    private function output_standard_analytics( $settings ) {
        if( isset( $settings['ua_code']['value'] ) && trim( $settings['ua_code']['value'] ) != false ) {
            $ua_code = $settings['ua_code']['value'];
            include plugin_dir_path( __FILE__ ) . 'partials/mpress-analytics-public-display.php';
        }
    }

    private function output_custom_analytics( $settings ) {
        if( isset( $settings['script']['value'] ) && trim( $settings['script']['value'] ) != false ) {
            $output = $settings['script']['value'];
            echo $output;
        }
    }

} // end class
