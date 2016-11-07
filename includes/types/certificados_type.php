<?php
add_action('init', 'certificados_register', 1);

/* certificados Register */

function certificados_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Certificados', 'post type general name', 'codeless'),
		'singular_name' => _x('certificados', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'certificados', 'codeless'),
		'add_new_item' => __('Add New Person Entry', 'codeless'),
		'edit_item' => __('Edit Person Entry', 'codeless'),
		'new_item' => __('New Person Entry', 'codeless'),
		'view_item' => __('View Person Entry', 'codeless'),
		'search_items' => __('Search Person Entries', 'codeless'),
		'not_found' =>  __('No Person Entries found', 'codeless'),
		'not_found_in_trash' => __('No Person Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
	);
	
	$slugRule = (isset($cl_redata["certificados_slug"]) ? $cl_redata["certificados_slug"] : '');
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug'=>$slugRule,'with_front'=>true),
		'query_var' => true,
		'show_in_nav_menus'=> false,
		'supports' => array('title','thumbnail','editor')
	);
	
	register_post_type( 'certificados' , $args );
	
	register_taxonomy("certificados_entries", 
		array("certificados"), 
		array(	"hierarchical" => true, 
		"label" => "certificados Categories", 
		"singular_label" => "certificados Categories", 
		"rewrite" => true,
		"query_var" => true
	));  
}

add_filter("manage_edit-certificados_columns", "prod_edit_certificados_columns");
add_action("manage_posts_custom_column",  "prod_custom_certificados_columns");


function prod_edit_certificados_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		
		"title" => "Title",
		"certificados_entries" => "Categories"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}

function prod_custom_certificados_columns($column) {
	global $post;
	switch ($column) {
		case "description":
		break;
		case "price":
		break;
		case "certificados_entries":
			echo get_the_term_list($post->ID, 'certificados_entries', '', ', ','');
		break;
	}
}