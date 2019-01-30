<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Branding {

	public static function admin_bar( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );
	}

	public static function admin_footer() {
		add_filter( 'admin_footer_text', function() {
			return 'Customized by ' . GCFA_BRANDNAME;
		} );
		add_filter( 'update_footer', function() {
			return 'Version ' . GCFA_VERSION;
		}, 11 );
	}

	public static function login_stuff() {
		
	}
}