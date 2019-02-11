<?php

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Menus {

	public static function register() {
		register_nav_menus(
			[
				'header-menu' => 'Header Menu',
				'footer-menu' => 'Footer Menu',
				'third-menu' => 'Extra Menu'
			]
		);
	}
}