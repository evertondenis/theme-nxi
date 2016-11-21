<?php
add_action('init', 'inbound_register', 1);

/* Inbound Register */

function inbound_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Inbound', 'post type general name', 'codeless'),
		'singular_name' => _x('inbound Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'inbound', 'codeless'),
		'add_new_item' => __('Add New inbound Entry', 'codeless'),
		'edit_item' => __('Edit inbound Entry', 'codeless'),
		'new_item' => __('New inbound Entry', 'codeless'),
		'view_item' => __('View inbound Entry', 'codeless'),
		'search_items' => __('Search inbound Entries', 'codeless'),
		'not_found' =>  __('No inbound Entries found', 'codeless'),
		'not_found_in_trash' => __('No inbound Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
		);

	$slugRule = (isset($cl_redata["inbound_slug"]) ? $cl_redata["inbound_slug"] : '');

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('inbound-type','title','thumbnail','excerpt','editor','comments', 'custom-fields')
		);

	register_post_type( 'inbound' , $args );

	register_taxonomy("inbound_entries", 
		array("inbound"),
		array(	"hierarchical" => true,
			"label" => "inbound Categories",
			"singular_label" => "inbound Categories",
			"rewrite" => true,
			"query_var" => true
			));
}

add_filter("manage_edit-inbound_columns", "prod_edit_inbounds_columns");

add_action("manage_posts_custom_column",  "prod_custom_inbounds_columns");

function prod_edit_inbounds_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"inbound_entries" => "Categories"
		);

	$columns= array_merge($newcolumns, $columns);
	return $columns;
}

function prod_custom_inbounds_columns($column) {
	global $post;

	switch ($column) {
		case "description":
		break;

		case "price":
		break;

		case "inbound_entries":
			echo get_the_term_list($post->ID, 'inbound_entries', '', ', ','');
		break;
	}
}