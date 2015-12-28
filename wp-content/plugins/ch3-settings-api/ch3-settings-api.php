<?php

/* 
 * Plugin Name: Chapter 3 -- Settings API
 * Author: Nate Robinson
 * Version: 1.0
 * Description: Plugin that uses the Settings API to process configuration pages
 */

define("VERSION", "1.1");

register_activation_hook(__FILE__, 'ch3sapi_set_default_options');

function ch3sapi_set_default_options() {
    if(get_option('ch3sapi_options')===false) {
        $new_options['ga_account_name'] = 'UA-000000-0';
        $new_options['track_outgoing_links'] = false;
        $new_options['version'] = VERSION;
        add_option('ch3sapi_options', $new_options);
    }
}

add_action('admin_init','ch3sapi_init');

function ch3sapi_init() {
    register_setting('ch3sapi_settings','ch3sapi_options','ch3sapi_validation');
    add_settings_section('ch3sapi_main_section', 'Main Settings Section', 'ch3sapi_main_setting_section_callback', 'ch3sapi_settings_section');
}

function ch3sapi_validation() {
    
}

function ch3sapi_settings_section() {
    
}

function ch3sapi_main_setting_section_callback() {
    
}