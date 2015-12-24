<?php

/* 
 * Plugin Name: Simple Widget
 * Version 1.0
 * Author: Nate Robinson
 * Description: My first widget plugin
 */

class SimpleWidget extends WP_Widget {
    function SimpleWidget() {
        
    }
    
    function widget($args, $instance) {
        extract( $args, EXTR_SKIP );
        $title = ($instance['title']) ? $instance['title'] : 'A Simple Widget';
        $body = ($instance['body']) ? $instance['body'] : "A simple message";
        
        
        
    }
    
    function update() {
        
    }
    
    function form() {
        
    }
}