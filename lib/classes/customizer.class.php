<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Customizer {

	public static function init() {
		add_action( 'customize_register', [ __CLASS__, 'register_customizer' ] );
	}

	public static function register_customizer( $wp_customize ) {
		$wp_customize->add_panel( 'gcfa_footer', [
			'title' => 'Footer',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'description' => 'Control the content of the site footer',
			'priority' => 60
		]);
	}
}