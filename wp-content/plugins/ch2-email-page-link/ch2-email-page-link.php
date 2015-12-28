<?php

/* 
 * Plugin Name: Chaper 2 - Email Page Link
 * Description: Email page link
 * Author: Nate Robinson
 * Version: 1.0
 * License: GPLv2
 */

add_filter('the_content','ch2epl_email_page_filter');

function ch2epl_email_page_filter($content) {
    //build url to mail message icon
    $mail_icon_url = plugins_url('mailicon.png',__FILE__);
    
    //set initial value of $new_content var to previous content
    $new_content = $content;
    
    //Append image with mailto link after content, including item title and permanent URL
    $new_content .= "<a title='E-mail article link' href='mailto:nate@nate78.com?subject="
            . "Check out this article entitled " .  get_the_title() . "&body=Hi!"
            . "%0A%0AI thought you would enjoy this article entitled " . get_the_title() 
            . ".%0A%0A" . get_permalink() . "%0A%0AEnjoy!'>"
            . "<img style='display:inline-block;' alt='' src='" . $mail_icon_url . "' />Email this Article</a>";
    
    //Return filtered content for display on the site
    return $new_content;
}