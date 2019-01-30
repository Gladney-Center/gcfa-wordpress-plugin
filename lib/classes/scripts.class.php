<?php 

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Scripts {
    public static function init() {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');
        
        //styles
        wp_enqueue_style('gladney-main', get_stylesheet_directory_uri().'/style.css', false, null);
    }
}