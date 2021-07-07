<?php

remove_action('template_redirect', 'redirect_canonical');

function remove_redirects() {
    add_rewrite_rule('^/(.+)/?', 'index.php', 'top');
}

add_action('init', 'remove_redirects');

function load_vue_scripts() {
    wp_enqueue_style('/dist/styles/master.css', get_template_directory_uri() . '/dist/styles/master.css', false, null);
    wp_enqueue_script('/dist/scripts/manifest.js', get_template_directory_uri() . '/dist/scripts/manifest.js', null, null, true);
    wp_enqueue_script('/dist/scripts/vendor.js', get_template_directory_uri() . '/dist/scripts/vendor.js', null, null, true);
    wp_enqueue_script('/dist/scripts/app.js', get_template_directory_uri() . '/dist/scripts/app.js', null, null, true);
}

add_action('wp_enqueue_scripts', 'load_vue_scripts', 100);

// Friendly Cab Testimonials
function fc_testimonials() {
	$labels = array(
		'name' 					=> _x('Testimonials', 'post type general name'),
		'singular_name' 		=> _x('Testimonials', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Testimonials'),
		'add_new_item' 			=> __('Add New Testimonial'),
		'edit_item' 			=> __('Edit Testimonial'),
		'new_item' 				=> __('New Testimonial'),
		'all_items' 			=> __('All Testimonials'),
		'view_item' 			=> __('View Testimonial'),
		'search_items' 			=> __('Search Testimonials'),
		'not_found' 			=> __('No Testimonials found'),
		'not_found_in_trash' 	=> __('No Testimonials found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Testimonials',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s client testimonials.',
		'menu_icon' 			=> 'dashicons-edit',
		'public' 				=> false,
        'show_in_rest'          => true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 11,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('testimonials', $args);
}

add_action('init', 'fc_testimonials');

// Friendly Cab Cars
function fc_cars() {
	$labels = array(
		'name' 					=> _x('Cars', 'post type general name'),
		'singular_name' 		=> _x('Cars', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Cars'),
		'add_new_item' 			=> __('Add New Car'),
		'edit_item' 			=> __('Edit Car'),
		'new_item' 				=> __('New Car'),
		'all_items' 			=> __('All Cars'),
		'view_item' 			=> __('View Car'),
		'search_items' 			=> __('Search Cars'),
		'not_found' 			=> __('No Cars found'),
		'not_found_in_trash' 	=> __('No Cars found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Cars',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s cars.',
		'menu_icon' 			=> 'dashicons-car',
		'public' 				=> false,
        'show_in_rest'          => true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 12,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('cars', $args);
}

add_action('init', 'fc_cars');

// Friendly Cab Services
function fc_services() {
	$labels = array(
		'name' 					=> _x('Services', 'post type general name'),
		'singluar_name' 		=> _x('Services', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Services'),
		'add_new_item' 			=> __('Add New Service'),
		'edit_item' 			=> __('Edit Service'),
		'new_item'				=> __('New Service'),
		'all_items' 			=> __('All Services'),
		'view_item' 			=> __('View Service'),
		'search_items' 			=> __('Search Services'),
		'not_found' 			=> __('No Services found'),
		'not_found_in_trash' 	=> __('No Services found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Services'
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s services.',
		'menu_icon' 			=> 'dashicons-insert',
		'public' 				=> true,
		'show_in_rest'          => true,
		'publicly_queryable' 	=> true,
		'menu_position' 		=> 13,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false,
	);
	
	register_post_type('services', $args);
}

add_action('init', 'fc_services');

// Friendly Cab Menus
function fc_menus() {
	$labels = array(
		'name' 					=> _x('Menus', 'post type general name'),
		'singular_name' 		=> _x('Menus', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Menus'),
		'add_new_item' 			=> __('Add New Menu'),
		'edit_item' 			=> __('Edit Menu'),
		'new_item' 				=> __('New Menu'),
		'all_items' 			=> __('All Menus'),
		'view_item' 			=> __('View Menu'),
		'search_items' 			=> __('Search Menus'),
		'not_found' 			=> __('No Menus found'),
		'not_found_in_trash' 	=> __('No Menus found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Menus',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s menus.',
		'menu_icon' 			=> 'dashicons-menu',
		'public' 				=> false,
        'show_in_rest'          => true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 13,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('menus', $args);
}

add_action('init', 'fc_menus');