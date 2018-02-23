<?php
/** Custom Post Types **/


/* Large Banners that Appear on the frontpage */
function create_banners()  {	
	$labels = array(
		'name' => _x('Banners', 'post type general name'),
		'singular_name' => _x('New Banner', 'post type singular name'),
		'add_new' => _x('Add New Banner', 'book'),
		'add_new_item' => __('Add New Banner'),
		'edit_item' => __('Edit Banner'),
		'new_item' => __('New Banner'),
		'all_items' => __('All Banners'),
		'view_item' => __('View Banner'),
		'search_items' => __('Search Banners'),
		'not_found' =>  __('No Banners found'),
		'not_found_in_trash' => __('No Banners found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Banners')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'events'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',
		'capability_type' => 'page',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('newbanners', $args);		
}
add_action('init', 'create_banners');

/* Special events that need more attention than the calendar */
function create_events()  {	
	$labels = array(
		'name' => _x('Events and Products', 'post type general name'),
		'singular_name' => _x('New Event', 'post type singular name'),
		'add_new' => _x('Add New Event', 'book'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Event'),
		'new_item' => __('New Event'),
		'all_items' => __('All Events'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Events'),
		'not_found' =>  __('No Events found'),
		'not_found_in_trash' => __('No Events found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Events')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'events'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',
		'capability_type' => 'page',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('newevents', $args);		
}
add_action('init', 'create_events');

/* Individual store details for their instances of major events */
function create_storeeventdetails()  {	
	$labels = array(
		'name' => _x('Store Event Details', 'post type general name'),
		'singular_name' => _x('New Store Event Details', 'post type singular name'),
		'add_new' => _x('Add Store Event Details', 'book'),
		'add_new_item' => __('Add Store Event Details'),
		'edit_item' => __('Edit Store Event Details'),
		'new_item' => __('New Store Event Details'),
		'all_items' => __('All Store Event Details'),
		'view_item' => __('View Store Event Details'),
		'search_items' => __('Search Store Event Details'),
		'not_found' =>  __('No Store Event Details found'),
		'not_found_in_trash' => __('No Store Event Details found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Store Event Details')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'storeeventdetails'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',			
		'capability_type' => 'page',
		'has_archive' => false, 
		'hierarchical' => false,
		'menu_position' => null,
		'exclude_from_search' => true,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('storeeventdetails', $args);		
}
add_action('init', 'create_storeeventdetails');	

/* Individual stores, also used to populate Store Event Details menu */
function create_stores()  {	
	$labels = array(
		'name' => _x('Stores', 'post type general name'),
		'singular_name' => _x('New Store', 'post type singular name'),
		'add_new' => _x('Add New Store', 'book'),
		'add_new_item' => __('Add New Store'),
		'edit_item' => __('Edit Store'),
		'new_item' => __('New Store'),
		'all_items' => __('All Stores'),
		'view_item' => __('View Store'),
		'search_items' => __('Search Stores'),
		'not_found' =>  __('No Stores found'),
		'not_found_in_trash' => __('No Stores found in Trash'), 
		'parent_item_colon' => '',
		'menu_name' => __('Stores')	
	);
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => false,
		'rewrite' => array('slug' => 'stores'),
		'menu_icon' => get_stylesheet_directory_uri() . '/dist/images/file.png',			
		'capability_type' => 'page',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array( 'title', 'thumbnail', 'editor' )
	); 		
	register_post_type('stores', $args);		
}
add_action('init', 'create_stores');	
?>