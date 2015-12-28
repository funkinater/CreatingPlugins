<?php

/* 
 * Plugin Name: Title Filter Plugin
 * Description: Title Filter Plugin
 * Author: Nate Robinson
 * Version: 1.0
 */

add_filter('document_title_parts','my_title_filter');
add_filter('the_content', 'mess_with_the_content');

function mess_with_the_content($content) {
    $new_content = "WARNING WARNING WARNING " . $content;
    return $new_content;
}

function my_title_filter($title) {

    if(is_front_page()) {
        $new_title['title'] = "Front Page >> ";
    } elseif (get_post_type() == 'page') {
        $new_title['title'] = "Page >> ";
    } elseif (get_post_type() == 'post') {
        $new_title['title'] = "Post >> ";
    }
    if (isset($new_title)) {
        $new_title['title'] .= $title['title'];
        return $new_title;
    } else {
        return $title;
    }
}

    ?>