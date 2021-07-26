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

// Friendly Cab Forms
function fc_forms() {
	$labels = array(
		'name' 					=> _x('Forms', 'post type general name'),
		'singular_name' 		=> _x('Forms', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Forms'),
		'add_new_item' 			=> __('Add New Car'),
		'edit_item' 			=> __('Edit Car'),
		'new_item' 				=> __('New Car'),
		'all_items' 			=> __('All Forms'),
		'view_item' 			=> __('View Car'),
		'search_items' 			=> __('Search Forms'),
		'not_found' 			=> __('No Forms found'),
		'not_found_in_trash' 	=> __('No Forms found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Forms',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s forms.',
		'menu_icon' 			=> 'dashicons-forms',
		'public' 				=> false,
        'show_in_rest'          => true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 14,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('forms', $args);
}

add_action('init', 'fc_forms');

// Extension of the WP REST API class to remove the inability to publish posts through the API
// This is used as an extension for the School Applications so that an unauthorised user which is not logged in in WP
// can still send a POST API request.
// The School Application posts are set as Draft from the start and should NEVER be published
class FC_WP_REST_Controller extends WP_REST_Posts_Controller{
    public function create_item_permissions_check($request){
        if(!empty( $request['id'])){
            return new WP_Error(
                'rest_post_exists',
                __('Cannot create existing post.'),
                array('status' => 400)
            );
        }
        return true;
    }
}

// Friendly Cab School Applications
function fc_school_applications() {
	$labels = array(
		'name' 					=> _x('School Applications', 'post type general name'),
		'singular_name' 		=> _x('School Applications', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'School Applications'),
		'add_new_item' 			=> __('Add New School Application'),
		'edit_item' 			=> __('Edit School Application'),
		'new_item' 				=> __('New School Application'),
		'all_items' 			=> __('All School Applications'),
		'view_item' 			=> __('View School Application'),
		'search_items' 			=> __('Search School Applications'),
		'not_found' 			=> __('No School Applications found'),
		'not_found_in_trash' 	=> __('No School Applications found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Applications DB',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s school applications.',
		'menu_icon' 			=> 'dashicons-paperclip',
		'public' 				=> true,
        'show_in_rest'          => true,
		'rest_controller_class' => 'FC_WP_REST_Controller',
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 14,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('schoolapplications', $args);
}

add_action('init', 'fc_school_applications');

// For School Applications add the column Processed to show in the School Applications columns list
// whether the application has been processed or not. 
function fc_schoolapplications_columns($columns) {
  
    $columns = array(
		'cb' 		=> $columns['cb'],
		'title' 	=> __('Title'),
		'processed' => __('Processed'),
		'date' 		=> __('Date'),
    );
  
  	return $columns;
}

add_filter('manage_schoolapplications_posts_columns', 'fc_schoolapplications_columns');

// If the column read is the Processed column created above, read from the custom field set and show it 
// under the column name list
function fc_schoolapplications_column($column, $post_id) {
	// Processed column
	if ('processed' === $column) {
		if(get_field('processed', $post_id) == 1) {
			echo '<span style="color:green;"><strong>YES</strong></span>';
		}else{
			echo '<span style="color:red;"><strong>NO</strong></span>';
		}
	}
}

add_action('manage_schoolapplications_posts_custom_column', 'fc_schoolapplications_column', 10, 2);

// Friendly Cab Contact Forms
function fc_contact_forms() {
	$labels = array(
		'name' 					=> _x('Contact Forms', 'post type general name'),
		'singular_name' 		=> _x('Contact Forms', 'post type singular name'),
		'add_new' 				=> _x('Add New', 'Contact Forms'),
		'add_new_item' 			=> __('Add New Contact Form'),
		'edit_item' 			=> __('Edit Contact Form'),
		'new_item' 				=> __('New Contact Form'),
		'all_items' 			=> __('All Contact Forms'),
		'view_item' 			=> __('View Contact Form'),
		'search_items' 			=> __('Search Contact Forms'),
		'not_found' 			=> __('No Contact Forms found'),
		'not_found_in_trash' 	=> __('No Contact Forms found in Trash'),
		'parent_item_colon' 	=> '',
		'menu_name' 			=> 'Contact DB',
	);

	$args = array(
		'labels' 				=> $labels,
		'description' 			=> 'Holds Friendly Cab\'s contact forms.',
		'menu_icon' 			=> 'dashicons-email-alt',
		'public' 				=> true,
        'show_in_rest'          => true,
		'rest_controller_class' => 'FC_WP_REST_Controller',
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'exclude_from_search' 	=> true,
		'show_in_nav_menus' 	=> false,
		'has_archive' 			=> false,
		'rewrite' 				=> false,
		'menu_position' 		=> 14,
		'supports' 				=> array('title', 'page_attributes'),
		'has_archive' 			=> false, 
	);
	
	register_post_type('contactforms', $args);
}

add_action('init', 'fc_contact_forms');

// For Contact Forms add the column Acknowledged to show in the School Applications columns list
// whether the application has been acknowledged or not. 
function fc_contactforms_columns($columns) {
  
    $columns = array(
		'cb' 			=> $columns['cb'],
		'title' 		=> __('Title'),
		'acknowledged' 	=> __('Acknowledged'),
		'date' 			=> __('Date'),
    );
  
  	return $columns;
}

add_filter('manage_contactforms_posts_columns', 'fc_contactforms_columns');

// If the column read is the Acknowledged column created above, read from the custom field set and show it 
// under the column name list
function fc_contactforms_column($column, $post_id) {
	// Acknowledged column
	if ('acknowledged' === $column) {
		if(get_field('acknowledged', $post_id) == 1) {
			echo '<span style="color:green;"><strong>YES</strong></span>';
		}else{
			echo '<span style="color:red;"><strong>NO</strong></span>';
		}
	}
}

add_action('manage_contactforms_posts_custom_column', 'fc_contactforms_column', 10, 2);

// If CPT name is School Applications or Contact Forms, remove the ability to publish posts
// This is done to not expose the School Applications and Contact Forms in the REST API through the link
// The publish button now will have only a 'Save' feature and will operate as 'Save as Draft' button
// Deleting School Applications and Contact Forms will work normally
function fc_dont_publish($data , $postarr) {  
	if(($data['post_type'] == 'schoolapplications' || $data['post_type'] == 'contactforms') && $data['post_status'] !== 'trash'){
		$data['post_status'] = 'draft';
	}
	return $data;   
}  
  
add_filter('wp_insert_post_data' , 'fc_dont_publish' , '99', 2); 