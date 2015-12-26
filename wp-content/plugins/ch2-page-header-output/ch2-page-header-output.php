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
?>