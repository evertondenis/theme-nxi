<?php
add_action('init', 'materiais_register', 1);

/* materiais Register */

function materiais_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Materiais', 'post type general name', 'codeless'),
		'singular_name' => _x('Materiais Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'materiais', 'codeless'),
		'add_new_item' => __('Add New materiais Entry', 'codeless'),
		'edit_item' => __('Edit materiais Entry', 'codeless'),
		'new_item' => __('New materiais Entry', 'codeless'),
		'view_item' => __('View materiais Entry', 'codeless'),
		'search_items' => __('Search materiais Entries', 'codeless'),
		'not_found' =>  __('No materiais Entries found', 'codeless'),
		'not_found_in_trash' => __('No materiais Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
		);

	$slugRule = (isset($cl_redata["materiais_slug"]) ? $cl_redata["materiais_slug"] : '');

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('title','thumbnail','excerpt','editor','comments', 'category')
		);

	register_post_type( 'materiais' , $args );

	register_taxonomy("materiais_entries", 
		array("materiais"),
		array(	"hierarchical" => true,
			"label" => "materiais Categories",
			"singular_label" => "materiais Categories",
			"rewrite" => true,
			"query_var" => true
			));
}

add_filter("manage_edit-materiais_columns", "prod_edit_columns");

add_action("manage_posts_custom_column",  "prod_custom_columns");

function prod_edit_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"materiais_entries" => "Categories"
		);

	$columns= array_merge($newcolumns, $columns);
	return $columns;
}

function prod_custom_columns($column) {
	global $post;

	switch ($column) {
		case "description":
		break;

		case "price":
		break;

		case "materiais_entries":
			echo get_the_term_list($post->ID, 'materiais_entries', '', ', ','');
		break;
	}
}