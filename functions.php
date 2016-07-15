<?php
/* --------------------- Custom Post Types Load ---------------------- */
require_once( get_template_directory().'/includes/types/testimonial_type.php' );
require_once( get_template_directory().'/includes/types/portfolio_type.php' );
require_once( get_template_directory().'/includes/types/cases_type.php' );
require_once( get_template_directory().'/includes/types/destaques_type.php' );
require_once('wp_bootstrap_navwalker.php');

function scripts_do_template() {
    // Bootstrap core JavaScript
    // wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'));
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

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        'before_widget' => '<div class="row"><div class="col-md-12">',
        'after_widget' => '</div></div>',
        ));
}

add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {  
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
    } 
endif;