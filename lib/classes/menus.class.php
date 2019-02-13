<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Menus {

	public static function register() {
		register_nav_menus(
			[
				'header-menu' => 'Header Menu',
				'footer-menu' => 'Footer Menu',
				'custom-menu-1' => 'Custom Menu 1'
			]
		);
	}
}