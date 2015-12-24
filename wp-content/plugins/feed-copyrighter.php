<?php

/* 
 * Plugin Name: Content Watermark Plugin
 * Description: Add a watermark to content
 * Author: Nate Robinson
 * Version: 1.0
 */

function cwmp_add_watermark($content) {
    if(is_feed()) {
        return $content . " Created by Nate Robinson, copyright " .
                date('Y') .
                " all rights reserved";
    }
    
    return $content;
}

add_filter('the_content','cwmp_add_watermark');
