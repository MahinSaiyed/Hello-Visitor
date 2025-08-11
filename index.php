

<?php
/*
Plugin Name: Hello Visitor
Plugin URI: https://github.com/MahinSaiyed/hello-visitor
Description: Shows a welcome message to visitors using the shortcode [hello_visitor]
Version: 1.0
Author: Saiyed Mahin
Author URI: https://github.com/MahinSaiyed
*/


// Shortcode function
function hello_visitor_shortcode() {
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        $name = $current_user->display_name;
    } else {
        $name = 'Guest';
    }

    return '<p style="font-weight:bold; text-align:center;">Hello, ' . esc_html($name) . '!</p>';
}

// Register shortcode
add_shortcode('hello_visitor', 'hello_visitor_shortcode');

// header me show karne k liye
function hello_visitor_in_header() {
    echo hello_visitor_shortcode();
}
add_action('wp_head', 'hello_visitor_in_header');    
