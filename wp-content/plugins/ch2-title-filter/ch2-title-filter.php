<?php

/* 
 * Plugin Name: Title Filter Plugin
 * Description: Title Filter Plugin
 * Author: Nate Robinson
 * Version: 1.0
 */

add_filter('wp_title','ch2tf_title_filter');

function ch2tf_title_filter($title) {
    //Select new title based on item type
    if (is_front_page()) {
        $new_title = 'Front Page >> ';
    } elseif (get_post_type() == 'page') {
        $new_title = 'Page >> ';
    } elseif (get_post_type() == 'post') {
        $new_title = 'Post >> ';
    }
    //Append previous title to title prefix
    if (isset($new_title)) {
        $new_title .= $title;

        //Return new complete title
        return $new_title;
    } else {
        return $new_title;
    }
}

?>