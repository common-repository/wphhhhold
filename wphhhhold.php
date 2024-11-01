<?php
/*
Plugin Name: WPhhhhold!
Plugin URI: uri
Description: WPhhhhold! is a WordPress plugin that pulls in random placeholder images from http://hhhhold.com. Can be used in any page, post or text widget.
Version: 1.0
Author: John Brown
Author URI: http://thisisjohnbrown.com
License: license
License URI: license uri
*/

function wphhhhold_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'width' => '300',
        'height' => '300',
        'brightness' => isset($atts['brightness']),
    ), $atts ) );
    if($brightness){
        $brightness = '/' . $brightness;
    } else {
        $brightness = '';
    }
    $pands = '<div class="wp-hhhhold">';
    $pands .= '<img src="http://hhhhold.com/';
    $pands .= esc_attr($width) . 'x' . esc_attr($height) . esc_attr($brightness) . '?' . rand() . '" />';
    $pands .= '</div>';
    return $pands;
}
add_shortcode('wphhhhold', 'wphhhhold_shortcode');
if ( !is_admin() ): 
    add_filter('widget_text', 'do_shortcode', 11);
endif;
?>