<?php
/*
 * Plugin Name: Favicon Plugin
 * Version: 1.0
 * Description: Favicon Plugin
 * Author: Nate Robinson
 */

add_action('wp_head', 'ch2fi_page_header_output');

function ch2fi_page_header_output() {
    $icon_url = plugins_url('favicon.ico', __FILE__);
    ?>
    <link rel="shortcut icon" href="<?php echo $icon_url; ?>" />
    <?php
}
