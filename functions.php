<?php

/* 
* Custom Post Types Load 
*/

require_once( get_template_directory().'/includes/types/testimonial_type.php' );
require_once( get_template_directory().'/includes/types/portfolio_type.php' );
require_once( get_template_directory().'/includes/types/cases_type.php' );
require_once( get_template_directory().'/includes/types/team_type.php' );
require_once( get_template_directory().'/includes/types/clientes_type.php' );
require_once( get_template_directory().'/includes/types/parceiros_type.php' );
require_once( get_template_directory().'/includes/types/destaques_type.php' );

require_once('wp_bootstrap_navwalker.php');

function scripts_do_template() {
    wp_register_script('bootstrap', get_template_directory_uri().'/assets/lib/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'));
    wp_register_script('headroom', get_template_directory_uri().'/assets/js/headroom.js', array(), '', true );
    wp_register_script('slide', get_template_directory_uri().'/assets/js/jquery.slides.js', array(), '', true );
    wp_register_script('scripts', get_template_directory_uri().'/assets/js/scripts.js#asyncload', array(), '', true );
    
    // css template
    wp_enqueue_style( 'style-nxi', get_template_directory_uri() . '/assets/css/nextidea.css',false,'1.0','all');

    wp_enqueue_script('style-nxi');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('headroom');
    wp_enqueue_script('slide');
    wp_enqueue_script('scripts');
}

add_action('wp_enqueue_scripts', 'scripts_do_template');

add_action( 'after_setup_theme', 'wpt_setup' );

function wpt_setup() {  
    register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    nxi_theme_support();
    images_sizes();
}

function nxi_theme_support() {
    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'case', 'destaques', 'clientes', 'parceiros', 'portfolio', 'team', 'testimonial' ));
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio' ) );
}

function images_sizes() {
    add_image_size( 'team', 225, 345, true );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes($sizes) {
    return array_merge($sizes, array(
        'team' => __('Team Image'),
    ));
}

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        'before_widget' => '<div class="row"><div class="col-md-12">',
        'after_widget' => '</div></div>',
        ));
}






// Add the Events Meta Boxes

function add_events_metaboxes() {
    add_meta_box('wpt_events_date', 'Event Date', 'wpt_events_date', 'events', 'side', 'default');
    add_meta_box('wpt_events_location', 'Event Location', 'wpt_events_location', 'events', 'normal', 'high');
}

function wpt_events_location() {
    global $post;
    
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . 
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_location', true);
        $dresscode = get_post_meta($post->ID, '_dresscode', true);
    
    // Echo out the field
        echo '<p>Enter the location:</p>';
    echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';
        echo '<p>How Should People Dress?</p>';
        echo '<input type="text" name="_dresscode" value="' . $dresscode  . '" class="widefat" />';

}




function wpt_save_events_meta($post_id, $post) {
    
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
    
    $events_meta['_location'] = $_POST['_location'];
    
    // Add values of $events_meta as custom fields
    
    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }

    $events_meta['_location'] = $_POST['_location'];
    $events_meta['_dresscode'] = $_POST['_dresscode'];

}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields