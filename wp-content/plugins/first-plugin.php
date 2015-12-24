<?php

/* 
 * Plugin Name: Nate's Awesome Plugin
 * Plugin URI: http://www.creatingplugins.com/first-plugin
 * Description: This plugin does awesome things.
 * Author: Nate Robinson
 * Version: 1.0
 * Author URI: http://www.nate78.com
 */

global $wp_version;

if(!version_compare($wp_version, "3.0", ">=")) {
    die("You need at least version 3.0 of WordPress to use the copyright plugin.");
}
        