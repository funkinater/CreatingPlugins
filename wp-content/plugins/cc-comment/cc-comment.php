<?php
/*
 * Plugin Name: CC Comment Plugin
 * Description: Send a CC email to a particular email address when comment posted
 * Author: Nate Robinson
 * Version: 1.0
 * 
 */

function cc_comment($comment_ID) {
    $comment = get_comment($comment_ID, ARRAY_A);
    $to = get_option('cccomm_cc_email');
    $subject = "New Comment Posted at Your Blog";
    $message = "Here are the get_comment variables available to the function:\r\n";

    foreach ($comment as $key => $value) {
        $message .= "$key:  $value" . "\r\n";
    }
    //mail($to, $subject, $message);
    wp_mail($to, $subject, $message);
}

add_action('comment_post', 'cc_comment');

function cccomm_init() {
    register_setting('cccomm_options', 'cccomm_cc_email');
}
add_action('admin_init', 'cccomm_init');

function cccomm_option_page() {
    ?>
    <div class="wrap">
        <h2>CC Comments Options</h2>
        <p>Make selections here to define who gets CC'd when a post is submitted.</p>
        <form action="options.php" method="POST" id="cc-comments-email-options-form">
            <h3><label for="cccomm_cc_email">Email to CC:</label>
            <input type="text" id="cc_email" name="cccomm_cc_email" value="<?php echo esc_attr(get_option('cccomm_cc_email'));?>" /></h3>
            <p><input type="submit" name="submit" value="Save Email"></p>
            <?php settings_fields('cccomm_options'); ?>
        </form>
    </div>
    <?php
}

function cccomm_plugin_menu() {
    //add_options_page('CC Comments Option', 'CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page');
    
    /* Add a menu item in the admin panel */
    add_menu_page('CC Comments Option', 'CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page');
}

add_action('admin_menu', 'cccomm_plugin_menu');
