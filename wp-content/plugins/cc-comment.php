<?php

/* 
 * Plugin Name: CC Comment Plugin
 * Description: Send a CC email to a particular email address when comment posted
 * Author: Nate Robinson
 * Version: 1.0
 * 
 */

function cc_comment() {
    global $_REQUEST;
    $to = "nate@nate78.com";
    $subject = "New Comment Posted at Your Blog" . $_REQUEST['subject'];
    $message = "Message from " . $_REQUEST['name'] . "at email " . $_REQUEST['email'] .
            ": \n" . $_REQUEST['comments'];
    mail($to,$subject,$message);
    
}
add_action('comment_post','cc_comment()');
