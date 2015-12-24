<?php

/* 
 * Plugin Name: Nate's Activated Plugin
 * Description: This plugin will be activated
 * Author: Nate Robinson
 * Version: 1.0
 * 
 */

function my_plugin_activation() {
    //db create, create options, etc.
    error_log("My plugin activated");
}

function my_plugin_deactivation() {
    error_log("My plugin deactivated");
}

register_activation_hook(__FILE__, 'my_plugin_activation');
register_deactivation_hook(__FILE__, 'my_plugin_deactivation');