<?php
function scripts_do_template() {
    // Bootstrap core JavaScript
    // wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'));
    wp_register_script('bootstrap', get_template_directory_uri().'/lib/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'));
    
    // css template
    wp_enqueue_style( 'style-nxi', get_template_directory_uri() . '/css/nextidea.css',false,'1.0','all');

	wp_enqueue_script('style-nxi');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'scripts_do_template');