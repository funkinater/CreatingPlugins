<?php

/*
 * Plugin Name: Page Header Output Plugin
 * Description: A plugin that inserts code into the header
 * Author: Nate Robinson
 * Version: 1.0
 * License: GPLv2
 */

add_action('wp_head', 'ch2pho_page_header_output');

function ch2pho_page_header_output() {
    ?>
    <script type="text/javascript">
        var gaJsHost = (( "https:" === document.location.protocol) ?
                "https://ssl." : "http://www.");
        document.write( unescape( "%3Cscript src='" + gaJsHost + 
                "google-analytics.com/ga.js' \n\
                        type ='text/javascript' %3E%3C/script%3E"));
                
    </script>
    <script type="text/javascript">
        try {
            var pageTrcker = _gat._getTracker("UA-xxxxxx-x");
            pageTracker._trackPageview();
        } catch ( err ) {}
    </script>
    <?php

}
add_filter('the_content','ch2lfa_link_filter_analytics');

function ch2lfa_link_filter_analytics($content) {
    $new_content = str_replace("href", "onClick=\"recordOutboundLink(this,'Outbound Links', '" . home_url() . "'); return false;\" href", $content);
    return $new_content;
}

add_action('wp_footer','ch2lfa_footer_analytics_code');

function ch2lfa_footer_analytics_code() {
    ?>
    <script type="text/javascript">
        function recordOutboundLink(link, category, action) {
            _gat._getTrackerByName()._trackEvent( category, action );
            setTimeout( 'document.location = "' + link.href + '"', 100);
        }
    </script>
    
    <?php
}

register_activation_hook(__FILE__, 'ch2pho_set_default_options_array');

function ch2pho_set_default_options_array() {
    if(get_option('ch2pho_options')===false) {
        $new_options['ga_account_name'] = "UA-000000-0";
        $new_options['track_outgoing_links'] = false;
        $new_options['version'] = "1.1";
        add_option('ch2pho_options',$new_options);
    } else {
        $existing_options = get_option('ch2pho_options');
        if ($existing_options['version'] < 1.1) {
            $existing_options['track_outgoing_links'] = false;
            $existing_options['version'] = "1.1";
            update_option('ch2pho_options', $existing_options);
        }
    }
}

add_action('admin_menu','ch2pho_settings_menu');

function ch2pho_settings_menu() {
    $options_page = add_options_page('My Google Analytics Configuration',
            'My Google Analytics',
            'manage_options',
            'ch2pho-my-google-analytics',
            'ch2pho_config_page');
    
    if($options_page) {
        add_action('load-' . $options_page, 'ch2pho_help_tabs');
    }
}

function ch2pho_help_tabs() {
    $screen = get_current_screen();
    $screen->add_help_tab(array(
        'id' => 'ch2pho-plugin-help-instructions',
        'title' => 'Instructions',
        'callback' => 'ch2pho_plugin_help_instructions'
    ));
    $screen->add_help_tab(array(
        'id' => 'ch2pho-plugin-help-faq',
        'title' => 'FAQ',
        'callback' => 'ch2pho_plugin_help_faq'
    ));
    $screen->set_help_sidebar('<p>This is the sidebar content.</p>');
}

function ch2pho_plugin_help_instructions() {
    ?>
    <p>These are instructions for how to use this plugin.</p>
    <?php
}

function ch2pho_plugin_help_faq() {
    ?>
    <p>Here is a list of the most frequently-asked questions.</p>
    <?php
}

function ch2pho_init() {
    register_setting('ch2pho_option_group', 'ch2pho_options');
}
add_action('admin_init', 'ch2pho_init');

function ch2pho_config_page() {
    //retrieve the plugin options from the database
    $options = get_option('ch2pho_options');
    ?>
    
    <div id="ch2pho-general" class="wrap">
        <h2>My Google Analytics</h2>
        <form method="post" action="options.php">
            <?php settings_fields('ch2pho_option_group'); ?>
            <label for="ch2pho_options[ga_account_name]">Account Name:<br>
                <input type="text" name="ch2pho_options[ga_account_name]" value="<?php echo esc_html($options['ga_account_name']);?>" /></label><br/>
            <label for="ch2pho_options[version]">Version:<br>
                <input type="text" name="ch2pho_options[version]" value="<?php echo esc_html($options['version']);?>" /></label><br/>
            <label for="ch2pho_options[track_outgoing_links]">Track Outgoing Links
                <input type="checkbox" name="ch2pho_options[track_outgoing_links]"
                   <?php if($options['track_outgoing_links']) echo ' checked="checked" '; ?> /><br />
            </label>
            <input type="submit" value="Submit" class="button-primary" />
        </form>
    </div>
    
    <?php
       
}


?>