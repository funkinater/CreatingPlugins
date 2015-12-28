<?php

/* 
 * Plugin Name: Hide Menu Item(s)
 * Description: Hide menu items from displaying
 * Author: Nate Robinson
 * Version: 1.0
 * License: GPLv2
 */

add_action('admin_menu','my_hide_menu_item');

function my_hide_menu_item() {
    remove_menu_page('link-manager.php');
    remove_submenu_page('options-general.php','options-permalink.php');
}