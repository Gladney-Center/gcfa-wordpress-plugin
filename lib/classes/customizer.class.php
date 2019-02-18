<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Customizer {

	public static function init() {
		add_action( 'customize_register', [ __CLASS__, 'register_customizer' ], 99 );
	}

	public static function register_customizer( $wp_customize ) {
		// cleanup
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('custom_css');
		$wp_customize->remove_section('static_front_page');

		$wp_customize->add_panel( 'gcfa_footer', [
			'title' => 'Footer',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'description' => 'Control the content of the site footer',
			'priority' => 130
		]);

		$wp_customize->add_panel( 'gcfa_pages', [
			'title' => 'Pages',
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'description' => 'Edit content within the pages of this site',
			'priority' => 140
		]);
	}
}