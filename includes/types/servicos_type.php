<?php
add_action('init', 'servicos_register', 1);

/* servicos Register */

function servicos_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Serviços', 'post type general name', 'codeless'),
		'singular_name' => _x('servicos Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'servicos', 'codeless'),
		'add_new_item' => __('Add New servicos Entry', 'codeless'),
		'edit_item' => __('Edit servicos Entry', 'codeless'),
		'new_item' => __('New servicos Entry', 'codeless'),
		'view_item' => __('View servicos Entry', 'codeless'),
		'search_items' => __('Search servicos Entries', 'codeless'),
		'not_found' =>  __('No servicos Entries found', 'codeless'),
		'not_found_in_trash' => __('No servicos Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
		);

	$slugRule = (isset($cl_redata["servicos_slug"]) ? $cl_redata["servicos_slug"] : '');

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

	register_post_type( 'servicos' , $args );

	register_taxonomy("servicos_entries", 
		array("servicos"),
		array(	"hierarchical" => true,
			"label" => "servicos Categories",
			"singular_label" => "servicos Categories",
			"rewrite" => true,
			"query_var" => true
			));
}

add_filter("manage_edit-servicos_columns", "prod_edit_servicos_columns");

add_action("manage_posts_custom_column",  "prod_custom_servicos_columns");

function prod_edit_servicos_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"servicos_entries" => "Categories"
		);

	$columns= array_merge($newcolumns, $columns);
	return $columns;
}

function prod_custom_servicos_columns($column) {
	global $post;

	switch ($column) {
		case "description":
		break;

		case "price":
		break;

		case "servicos_entries":
			echo get_the_term_list($post->ID, 'servicos_entries', '', ', ','');
		break;
	}
}