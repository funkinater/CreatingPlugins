<?php

//Check that code was called from WordPress with uninstallation constant declared
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}
    if (get_option('ch2pho_options') != false) {
        delete_option('ch2pho_options');
    }