<?php 

namespace Gladney;

defined( 'ABSPATH' ) || die;

class Scripts {
    public static function init() {
        // git rid of default jQuery
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');

        // get rid of block styles on the front end (we'll control our own thankyouverymuch)
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('editor-blocks');
        wp_deregister_style('wp-block-library');
        wp_deregister_style('editor-blocks');

        $theme_name = @end(explode('/',get_stylesheet_directory()));

        //styles
        wp_enqueue_script('gladney-main', get_stylesheet_directory_uri()."/$theme_name.min.js");
        
        //styles
        wp_enqueue_style('gladney-main', get_stylesheet_directory_uri().'/style.min.css', false, null);
    }
}