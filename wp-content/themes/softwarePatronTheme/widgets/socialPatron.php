<?php
class Social_Links_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'social_links',
            'Social Links Widget',
            array(
                'description' => 'Display social links for Facebook, Twitter, and Instagram.'
            )
        );
    }

    // Front-end display of the widget
    public function widget( $args, $instance ) {
        $facebook_link = isset( $instance['facebook_link'] ) ? $instance['facebook_link'] : '';
        $twitter_link = isset( $instance['twitter_link'] ) ? $instance['twitter_link'] : '';
        $instagram_link = isset( $instance['instagram_link'] ) ? $instance['instagram_link'] : '';
    
        echo $args['before_widget'];
    
        // Display the social links in your desired format
        
  
        if ( ! empty( $facebook_link ) ) {
            echo '<a class="p-2" href="'.esc_url( $facebook_link ).'">';
            echo '<i class="fa-brands fa-facebook text fs-2" style="color: #33d7b6;"></i>';
            echo '</a>';
        }
        if ( ! empty( $twitter_link ) ) {
            echo '<a class="p-2" href="'.esc_url( $twitter_link ).'">';
            echo '<i class="fa-brands fa-facebook-messenger text fs-2" style="color: #005eff;"></i>';
            echo '</a>';
        }
        if ( ! empty( $instagram_link ) ) {
            echo '<a class="p-2" href="'.esc_url( $instagram_link ).'">';
            echo '<i class="fa-brands fa-instagram text fs-2" style="color: #ff00a2;"></i>';
            echo '</a>';
        }

    
        echo $args['after_widget'];
    }

    // Back-end widget form
    public function form( $instance ) {
        $facebook_link = isset( $instance['facebook_link'] ) ? esc_url( $instance['facebook_link'] ) : '';
        $twitter_link = isset( $instance['twitter_link'] ) ? esc_url( $instance['twitter_link'] ) : '';
        $instagram_link = isset( $instance['instagram_link'] ) ? esc_url( $instance['instagram_link'] ) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook_link' ); ?>">Facebook Link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" value="<?php echo $facebook_link; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter_link' ); ?>">Twitter Link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" value="<?php echo $twitter_link; ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram_link' ); ?>">Instagram Link:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>" name="<?php echo $this->get_field_name( 'instagram_link' ); ?>" value="<?php echo $instagram_link; ?>">
        </p>
        <?php
    }

    // Sanitize and save widget options
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['facebook_link'] = ! empty( $new_instance['facebook_link'] ) ? esc_url_raw( $new_instance['facebook_link'] ) : '';
        $instance['twitter_link'] = ! empty( $new_instance['twitter_link'] ) ? esc_url_raw( $new_instance['twitter_link'] ) : '';
        $instance['instagram_link'] = ! empty( $new_instance['instagram_link'] ) ? esc_url_raw( $new_instance['instagram_link'] ) : '';
        return $instance;
    }
}