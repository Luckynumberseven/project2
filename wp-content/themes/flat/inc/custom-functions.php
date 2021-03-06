<?php 

######################## Custom post types ################################

function post_type_course_init() {
	//For dashboard view
    $labels = array(
            'name'                  => "Course",
            'singular_name'         => "Course",
            'menu_name'             => "Course",
            'name_admin_bar'        => "Course",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Course', 'textdomain' ),
            'new_item'              => __( 'New Course', 'textdomain' ),
            'edit_item'             => __( 'Edit Course', 'textdomain' ),
            'view_item'             => __( 'View Course', 'textdomain' ),
            'all_items'             => __( 'All Courses', 'textdomain' ),
            'search_items'          => __( 'Search Courses', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Courses:', 'textdomain' ),
            'not_found'             => __( 'No Courses found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Courses found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Course',//_x( 'Insert into Course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
 	//Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'course' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
    );

    // Registers our custom post type with above arguments
	register_post_type('course', $args);
}

add_action('init', 'post_type_course_init');

function post_type_report_init() {
    //For dashboard view
    $labels = array(
            'name'                  => "Report",
            'singular_name'         => "Report",
            'menu_name'             => "Report",
            'name_admin_bar'        => "Report",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Report', 'textdomain' ),
            'new_item'              => __( 'New Report', 'textdomain' ),
            'edit_item'             => __( 'Edit Report', 'textdomain' ),
            'view_item'             => __( 'View Report', 'textdomain' ),
            'all_items'             => __( 'All Reports', 'textdomain' ),
            'search_items'          => __( 'Search Reports', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Reports:', 'textdomain' ),
            'not_found'             => __( 'No Reports found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Reports found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Report Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Report archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Report',//_x( 'Insert into Report', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Report', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Reports list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Reports list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Reports list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
    //Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'report' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),

    );

    // Registers our custom post type with above arguments
    register_post_type('report', $args);
}

add_action('init', 'post_type_report_init');


function post_type_course_components_init() {
    //For dashboard view
    $labels = array(
            'name'                  => "Course Components",
            'singular_name'         => "Course Component",
            'menu_name'             => "Course Components",
            'name_admin_bar'        => "Course Components",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Component', 'textdomain' ),
            'new_item'              => __( 'New Component', 'textdomain' ),
            'edit_item'             => __( 'Edit Component', 'textdomain' ),
            'view_item'             => __( 'View Component', 'textdomain' ),
            'all_items'             => __( 'All Component', 'textdomain' ),
            'search_items'          => __( 'Search Component', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Component:', 'textdomain' ),
            'not_found'             => __( 'No Component found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Component found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Component Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Component archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Component',//_x( 'Insert into Component', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Component', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
    //Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'component' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        //'register_meta_box_cb' => 'add_portfolio_metabox'

    );

    // Registers our custom post type with above arguments
    register_post_type('component', $args);
}

add_action('init', 'post_type_course_components_init');


function my_connection_types() {
    p2p_register_connection_type( array( 
        'name' => 'custom_post_manager',
        'from' => 'course',
        'to' => 'component',
        'cardinality' => 'one-to-many',
        'title' => array( 'from' => 'Managed by', 'to' => 'Manages' )
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );


######################## Taxonomies ################################

//Creates the  taxonomy for our custom post type.

function create_class_taxonomy() {
        $labels = array(
        'name'              => 'Classes',
        'singular_name'     => 'Class',
        'search_items'      => 'Search Classes',
        'all_items'         => 'All Classes',
        'parent_item'       => 'Parent Class',
        'parent_item_colon' => 'Parent Class:',
        'edit_item'         => 'Edit Class',
        'update_item'       => 'Update Class',
        'add_new_item'      => 'Add New Class',
        'new_item_name'     => 'New Class Name',
        'menu_name'         => 'Class',
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'class' ),
    );
 
    register_taxonomy( 'class', 'course', $args );
}
add_action( 'init', 'create_class_taxonomy' );

########################### Custom user fields ###################################


function modify_contact_methods($profile_fields) {

    // Add new fields
    $profile_fields['twitter'] = 'Twitter Username';
    $profile_fields['facebook'] = 'Facebook URL';
    $profile_fields['gplus'] = 'Google+ URL';

    return $profile_fields;
}

add_filter('user_contactmethods', 'modify_contact_methods');


add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) &&
    ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
    wp_redirect( home_url() );
    exit;
    }
}

################################

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "report") {

    //store our post vars into variables for later use
    //now would be a good time to run some basic error checking/validation
    //to ensure that data for these values have been set
    $title     = wp_strip_all_tags($_POST['title']);
    $content   = wp_strip_all_tags($_POST['content']);
    $post_type = 'report';
    $author = $_POST['author'];

      

    //the array of arguements to be inserted with wp_insert_post
    $new_post = array(
    'post_title'    => $title,
    'post_content'  => $content,
    'post_status'   => 'publish',          
    'post_type'     => $post_type,
    'post_author' => $author
    );

    //insert the the post into database by passing $new_post to wp_insert_post
    //store our post ID in a variable $pid
    $pid = wp_insert_post($new_post);

}