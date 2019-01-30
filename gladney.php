<?php
/*
Plugin Name:  Gladney Center for Adoption
Plugin URI:   https://adoptionsbygladney.com
Description:  Branding and set-up plugin for all GCFA Wordpress sites
Version:      1.0.0
Author:       David Paul Crouch
License:      MIT License
*/

defined('ABSPATH') || die;

if ( ! defined( 'GCFA_PLUGIN_FILE' ) ) define( 'GCFA_PLUGIN_FILE', __FILE__ );

require_once __DIR__ . '/lib/gladney.class.php';

\Gladney\Gladney::instance();

// end of line, man.