<?php 

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Scripts {
    public static function init() {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        $theme_name = @end(explode('/',get_stylesheet_directory()));

        //styles
        wp_enqueue_script('gladney-main', get_stylesheet_directory_uri()."/$theme_name.min.js");
        
        //styles
        wp_enqueue_style('gladney-main', get_stylesheet_directory_uri().'/style.min.css', false, null);
    }
}