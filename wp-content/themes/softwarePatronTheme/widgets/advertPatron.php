<?php
// Custom Message Widget
class AdvertPatron extends WP_Widget {

    public function __construct() {
        $widget_options = array(
            'description' => 'Display a custom message added by the user.',
         
        );
    
        parent::__construct(
            'ad_bar', // Use the same widget ID as the widget area registration in functions.php
            'Advertisement Widget (Patron)', // Widget Name
            $widget_options // Use the modified widget options
        );
    }

    // Front-end display of widget
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['image_url'] ) ) {
            echo '<img src="' . esc_url( $instance['image_url'] ) . '" alt="Advertisement">';
        }
        echo $args['after_widget'];
    }

// Back-end widget form
public function form( $instance ) {
    $image_url = isset( $instance['image_url'] ) ? $instance['image_url'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'image_url' ); ?>">Ad Image URL:</label><br>

        <input type="text" class="widefat custom-media-input" id="<?php echo $this->get_field_id( 'image_url' ); ?>" 
        name="<?= $this->get_field_name( 'image_url' ); ?>" value="<?php echo esc_attr( $image_url ); ?>">

       
        <button class="button button-outline-danger custom-media-button" data-target="<?php echo $this->get_field_id( 'image_url' ); ?>">Select Image</button>
    </p>
    <?php
}

    // Sanitize and save widget options
    public function update( $new_instance, $old_instance ) {
        // Log the $new_instance and $old_instance arrays
    error_log('New Instance: ' . print_r($new_instance, true));
    error_log('Old Instance: ' . print_r($old_instance, true));
        $instance = $old_instance;
    
        $instance['image_url'] = ! empty( $new_instance['image_url'] ) ? sanitize_text_field( $new_instance['image_url'] ) : '';
        return $instance;
    }
}

$advertPatron = new AdvertPatron();