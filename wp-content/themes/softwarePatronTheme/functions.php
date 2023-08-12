<?php


function load_stylesheets()
{
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');

    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
    wp_enqueue_style('stylesheet');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_javascript()
{
    // Enqueue jQuery first
    wp_enqueue_script('jquery');
    // Enqueue your custom script
    wp_enqueue_script('custom', get_template_directory_uri() . '/app.js', '', '1.0', true);
    // Enqueue Bootstrap
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.1', true);


}

add_action('wp_enqueue_scripts', 'load_javascript');

//add menus
add_theme_support('menus');

//Register some menus
register_nav_menus(
    array(
        'top-menu' => __('Top Menu', 'theme')
    )
);

// Enable title tag support
function theme_setup()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'theme_setup');


function customtheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'customtheme_add_woocommerce_support');


// Enable header image support
function theme_custom_header_setup()
{
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/images/default-header.jpg',
        // Set a default header image (optional)
        'width' => 1200,
        'height' => 400,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => false,
        // Set to true to display header text on top of the image
        'uploads' => true, // Allow users to upload their own header image
    ));
}

add_action('after_setup_theme', 'theme_custom_header_setup');

// Custom widgets ******************************************************
// Add widget support - where do you want to display which widget
function custom_theme_widgets_init()
{
    // Register widgetized areas 
    register_sidebar(
        array(
            'name' => 'Advertisement bar',
            // Sidebar name (you can change this)
            'id' => 'ad_bar',
            // Sidebar ID (you can change this)
            'description' => 'Your advertisements will be displayed here.',
            // Sidebar description
            'before_widget' => '<div class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(
            array(
                'name' => 'Social Links',
                // Sidebar name (you can change this)
                'id' => 'social_links',
                // Sidebar ID (you can change this)
                'description' => 'Your social links will be displayed here.',
                // Sidebar description
                'before_widget' => '<div class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>',
            ));

    // You can register more widget areas here if needed
}
add_action('widgets_init', 'custom_theme_widgets_init');

// custom widget - backend and frontend
require_once get_template_directory() . '/widgets/advertPatron.php';
require_once get_template_directory() . '/widgets/socialPatron.php';
// Register the Social Links widget
function register_social_links_widget() {
    register_widget( 'Social_Links_Widget' );
}
add_action( 'widgets_init', 'register_social_links_widget' );
function register_advertPatron()
{
    register_widget('AdvertPatron');
}

add_action('widgets_init', 'register_advertPatron');

// media uploader for widget - advertPatron
// Add JavaScript for media uploader
function advert_patron_widget_media_uploader()
{
    ?>
    <script>
        jQuery(document).ready(function ($) {
            $(document).on('click', '.custom-media-button', function (e) {
                e.preventDefault();
                var custom_media = true;
                var target = $(this).prev('.custom-media-input');
                var original_send_attachment = wp.media.editor.send.attachment;
                wp.media.editor.send.attachment = function (props, attachment) {
                    $(target).val(attachment.url).trigger('change');
                    wp.media.editor.send.attachment = original_send_attachment;
                    console.log('Image URL:', attachment.url);
                  
                };
                wp.media.editor.open($(this));
                return false;
            });
        });
    </script>
    <?php
}


add_action('admin_footer', 'advert_patron_widget_media_uploader');