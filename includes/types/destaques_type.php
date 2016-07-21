<?php
add_action('init', 'destaque_register', 1);

/* Destaque Register */

function destaque_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Destaques', 'post type general name', 'codeless'),
		'singular_name' => _x('Destaque Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'destaque', 'codeless'),
		'add_new_item' => __('Add New destaque Entry', 'codeless'),
		'edit_item' => __('Edit destaque Entry', 'codeless'),
		'new_item' => __('New destaque Entry', 'codeless'),
		'view_item' => __('View destaque Entry', 'codeless'),
		'search_items' => __('Search destaque Entries', 'codeless'),
		'not_found' =>  __('No destaque Entries found', 'codeless'),
		'not_found_in_trash' => __('No destaque Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
		);

	$slugRule = (isset($cl_redata["destaque_slug"]) ? $cl_redata["destaque_slug"] : '');

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('title','thumbnail','excerpt','editor','comments')
		);

	register_post_type( 'destaque' , $args );

	register_taxonomy("destaque_entries", 
		array("destaque"),
		array(	"hierarchical" => true,
			"label" => "Destaque Categories",
			"singular_label" => "destaque Categories",
			"rewrite" => true,
			"query_var" => true
			));
}

add_filter("manage_edit-destaque_columns", "prod_edit_destaques_columns");

add_action("manage_posts_custom_column",  "prod_custom_destaques_columns");

function prod_edit_destaques_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"destaque_entries" => "Categories"
		);

	$columns= array_merge($newcolumns, $columns);
	return $columns;
}

function prod_custom_destaques_columns($column) {
	global $post;

	switch ($column) {
		case "description":
		break;

		case "price":
		break;

		case "destaque_entries":
			echo get_the_term_list($post->ID, 'destaque_entries', '', ', ','');
		break;
	}
}