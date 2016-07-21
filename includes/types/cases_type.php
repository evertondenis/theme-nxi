<?php
add_action('init', 'case_register', 1);

/* Cases Register */

function case_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Cases', 'post type general name', 'codeless'),
		'singular_name' => _x('Case Entry', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'case', 'codeless'),
		'add_new_item' => __('Add New case Entry', 'codeless'),
		'edit_item' => __('Edit case Entry', 'codeless'),
		'new_item' => __('New case Entry', 'codeless'),
		'view_item' => __('View case Entry', 'codeless'),
		'search_items' => __('Search case Entries', 'codeless'),
		'not_found' =>  __('No case Entries found', 'codeless'),
		'not_found_in_trash' => __('No case Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
		);

	$slugRule = (isset($cl_redata["case_slug"]) ? $cl_redata["case_slug"] : '');

	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('case-type','title','thumbnail','excerpt','editor','comments')
		);

	register_post_type( 'case' , $args );

	register_taxonomy("case_entries", 
		array("case"),
		array(	"hierarchical" => true,
			"label" => "Case Categories",
			"singular_label" => "Case Categories",
			"rewrite" => true,
			"query_var" => true
			));
}

add_filter("manage_edit-case_columns", "prod_edit_cases_columns");

add_action("manage_posts_custom_column",  "prod_custom_cases_columns");

function prod_edit_cases_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Title",
		"case_entries" => "Categories"
		);

	$columns= array_merge($newcolumns, $columns);
	return $columns;
}

function prod_custom_cases_columns($column) {
	global $post;

	switch ($column) {
		case "description":
		break;

		case "price":
		break;

		case "case_entries":
			echo get_the_term_list($post->ID, 'case_entries', '', ', ','');
		break;
	}
}