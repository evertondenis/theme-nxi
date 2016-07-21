<?php
add_action('init', 'team_register', 1);

/* Team Register */

function team_register() {
	global $cl_redata;

	$labels = array(
		'name' => _x('Team', 'post type general name', 'codeless'),
		'singular_name' => _x('Team', 'post type singular name', 'codeless'),
		'add_new' => _x('Add New', 'team', 'codeless'),
		'add_new_item' => __('Add New Person Entry', 'codeless'),
		'edit_item' => __('Edit Person Entry', 'codeless'),
		'new_item' => __('New Person Entry', 'codeless'),
		'view_item' => __('View Person Entry', 'codeless'),
		'search_items' => __('Search Person Entries', 'codeless'),
		'not_found' =>  __('No Person Entries found', 'codeless'),
		'not_found_in_trash' => __('No Person Entries found in Trash', 'codeless'), 
		'parent_item_colon' => ''
	);
	
	$slugRule = (isset($cl_redata["team_slug"]) ? $cl_redata["team_slug"] : '');
	
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
	
	register_post_type( 'team' , $args );

	register_taxonomy("team_entries", 
		array("team"), 
		array(	"hierarchical" => true, 
		"label" => "Team Categories", 
		"singular_label" => "Team Categories", 
		"rewrite" => true,
		"query_var" => true),
		array (
	        "name"      => "difficulty",
	        "default"   => "3",
	        "label"     => __('Tutorial Difficulty Level', 'mytheme'),
	        "type"      => "text",
	        "desc"      => __('Enter the difficulty level here. Use only integer numbers from 0 (zero) to 5 (five).', 'mytheme')
	    )
		);
}

add_filter("manage_edit-team_columns", "prod_edit_team_columns");
add_action("manage_posts_custom_column",  "prod_custom_team_columns");


function prod_edit_team_columns($columns) {
	$newcolumns = array(
		"cb" => "<input type=\"checkbox\" />",
		
		"title" => "Title",
		"team_entries" => "Categories"
	);
	
	$columns= array_merge($newcolumns, $columns);
	
	return $columns;
}

function prod_custom_team_columns($column) {
	global $post;
	switch ($column) {
		case "description":
		break;
		case "price":
		break;
		case "team_entries":
			echo get_the_term_list($post->ID, 'team_entries', '', ', ','');
		break;
	}
}