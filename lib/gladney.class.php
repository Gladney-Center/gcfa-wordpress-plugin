<?php

namespace Gladney;

defined('ABSPATH') || die;

final class Gladney {

	protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }

	public function __construct() {
		$this->constants();
		$this->includes();
		$this->init_hooks();

		do_action('gladney_loaded');
	}

	private function constants() {
		$this->define( 'GCFA_BRANDNAME', 'Gladney Center for Adoption' );
		$this->define( 'GCFA_SHORTNAME', 'Gladney' );
		$this->define( 'GCFA_ACRONYM', 'GCFA' );
        $this->define( 'GCFA_VERSION', '1.0.0' );
	}

	private function includes() {
		// required functions
		require_once 'functions/gladney.functions.php';

		// required classes
		require_once 'classes/install.class.php';
		require_once 'classes/scripts.class.php';
		require_once 'classes/branding.class.php';
		require_once 'classes/menus.class.php';
	}

	private function init_hooks() {

		// plugin-specific hooks
		register_activation_hook( GCFA_PLUGIN_FILE, [ __NAMESPACE__ . '\\Install', 'install' ] );
        register_deactivation_hook( GCFA_PLUGIN_FILE, [ __NAMESPACE__ . '\\Install', 'uninstall' ] );
		add_action( 'after_setup_theme', [ $this, 'theme_setup' ] );
		add_action( 'init', [ $this, 'init' ], 1 );
		add_action( 'gladney_loaded', [ $this, 'gladney_loaded' ], 999 );

		// front end hooks
		add_action( 'wp_enqueue_scripts', [ __NAMESPACE__ . '\\Scripts', 'init' ] );

		// admin hooks
		add_action( 'admin_bar_menu', [ __NAMESPACE__ . '\\Branding', 'admin_bar' ], 999 );
		add_action( 'admin_init', [ __NAMESPACE__ . '\\Branding', 'admin_footer' ], 999 );
	}

	public function init() {

		// changes
		add_filter( 'wp_mail_from', '__return_email_from' );
        add_filter( 'wp_mail_from_name', '__return_email_from_name' );
		add_filter( 'wp_mail_content_type', '__return_email_content_type' );
		
		// cleanup
		if ( ! current_user_can('manage_options') ) show_admin_bar( false );
        add_filter( 'ls_meta_generator', '__return_false' );
        add_filter( 'emoji_svg_url', '__return_false' );
        add_filter( 'pre_option_default_role', function($dr) {
            return '';
        } );
		remove_action( 'wp_head', '_admin_bar_bump_cb' );
        remove_action( 'wp_head', 'wp_generator' );
        //remove_action( 'rest_api_init', 'create_initial_rest_routes', 99 );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		
		// additions / class calls
		\Gladney\Menus::register();

	}

	public function theme_setup() {
        add_theme_support( 'custom-header' );
	}
	
	private function define( $const, $value ) {
        if ( ! defined( $const ) ) {
			define( $const, $value );
		}
	}
	
	public function gladney_loaded() {}
      
}