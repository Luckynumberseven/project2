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
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),

    );

    // Registers our custom post type with above arguments
	register_post_type('course', $args);
}

add_action('init', 'post_type_course_init');


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
?>