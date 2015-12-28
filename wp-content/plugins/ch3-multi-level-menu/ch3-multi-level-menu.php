<?php
/*
 * Plugin Name: Chapter 3 - Multi-Level Menu
 * Version: 1.0
 * Author: Nate Robinson
 * Description: Mult-level menu plugin
 */

add_action('admin_menu', 'my_option_menu');

function my_option_menu() {
    add_menu_page('My Complex Plugin Configuration Page', 'My Complex Plugin', 'manage_options', 'my-complex-plugin-main-menu', 'my_complex_main', plugins_url('myplugin.png', __FILE__));

    add_submenu_page('my-complex-plugin-main-menu', 'My Complex Menu Submenu', 'Submenu1', 'manage_options', 'my_complex_sub1', 'my_complex_sub1');
}

function my_complex_main() {
    
}

function my_complex_sub1() {
    ?>
    <div class="wrap">
        <h1>HELLO!</h1>
    </div>
    <?php
}

function my_complex_sub2() {
    
}
