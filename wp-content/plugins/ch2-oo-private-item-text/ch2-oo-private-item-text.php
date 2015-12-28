<?php

/* 
 * Plugin Name: Chapter 2 - Object-Oriented Private Text
 * Version 1.0
 * Author: Nate Robinson
 * Description: OO private item text
 */

class CH2_OO_Private_Item_Text {
    function __construct() {
        add_shortcode('private', array($this,'my_private_text'));
        add_action('wp_enqueue_scripts', array($this, 'add_private_stylesheet'));
    }
    
    function my_private_text($atts,$content=null) {
        if (is_user_logged_in()) {
            $new_content = "<span class='private'>" . $content . "</span>";
            return $new_content;   
        } else {
            return '';
        }
    }
    
    function add_private_stylesheet() {
        wp_enqueue_style('myprivatestylesheet',plugins_url('stylesheet.css',__FILE__));
    }
}

$my_ch2_oo_private_item_text = new CH2_OO_Private_Item_Text();
