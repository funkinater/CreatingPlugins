<?php
/*
 * Plugin Name: Simple Widget
 * Version 1.0
 * Author: Nate Robinson
 * Description: My first widget plugin
 */

class SimpleWidget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'foo_widget', // Base ID
                __('Widget Title', 'text_domain'), // Name
                array('description' => __('A Foo Widget', 'text_domain'),) // Args
        );
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = ($instance['title']) ? $instance['title'] : 'A Simple Widget';
        $body = ($instance['body']) ? $instance['body'] : 'A simple message';
        ?>
        <?php echo $before_widget; ?>
        <?php echo $before_title . $title . $after_title; ?>
        <p><?php echo $body; ?></p>
        <?php
            if(isset($instance)) :
                foreach ($instance as $key => $value) {
                    echo "$key: $value<br>";
                }
            endif;
    }

    function update() {
        
    }

    function form() {
        ?>
        <label for="<?php echo $this->get_field_id('title');?>">
        Title:
        <input id="<?php echo $this->get_field_id('title');?>" 
               name="<?php echo $this->get_field_name('title');?>"
               value="<?php echo esc_attr($instance['title']);?>" />
        </label><br>
        <label for="<?php echo $this->get_field_id('body');?>">
        Body:
        <textarea id="<?php echo $this->get_field_id('body');?>" 
               name="<?php echo $this->get_field_name('body');?>">
               <?php echo esc_attr($instance['body']);?>
               </textarea>
        </label>
        <?php
    }

}

function simple_widget_init() {
    register_widget("SimpleWidget");
}

add_action('widgets_init', 'simple_widget_init');
?>