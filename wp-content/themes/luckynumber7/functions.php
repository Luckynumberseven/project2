<?php
######################## Custom post types ################################
function post_type_student_init() {
    //For dashboard view
    $labels = array(
            'name'                  => "Student",
            'singular_name'         => "Student",
            'menu_name'             => "Student",
            'name_admin_bar'        => "Student",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Student', 'textdomain' ),
            'new_item'              => __( 'New Student', 'textdomain' ),
            'edit_item'             => __( 'Edit Student', 'textdomain' ),
            'view_item'             => __( 'View Student', 'textdomain' ),
            'all_items'             => __( 'All Students', 'textdomain' ),
            'search_items'          => __( 'Search Students', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Students:', 'textdomain' ),
            'not_found'             => __( 'No Students found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Students found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Student Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Student archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Student',//_x( 'Insert into Student', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Student', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Students list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Students list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Students list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
    //Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'student' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'register_meta_box_cb' => 'add_student_metabox'

    );

    // Registers our custom post type with above arguments
    register_post_type('student', $args);
}

add_action('init', 'post_type_student_init');

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
        //'register_meta_box_cb' => 'add_portfolio_metabox'

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

########################### Custom fields ###################################


// Adds the meta-box, called from register_post_type
function add_student_metabox() {
    add_meta_box('student_meta', 'Student Details', 'student_meta_fields', 'student', 'normal', 'high');
}

// Adds content to our meta-box from template, called from add_meta_box
function student_meta_fields() {
    //get_template_part('template-parts/custom-fields-portfolio');
    ?>
    Name <input type="text" name="name" value="<?php echo get_post_meta($post->ID, 'name', true) ?>">
    Class <input type="text" name="class" value="<?php echo get_post_meta($post->ID, 'class', true) ?>">
    Email <input type="text" name="email" value="<?php echo get_post_meta($post->ID, 'email', true) ?>">
    <?php
}

//Handles saving values for our meta-data. Our POST values for each field is added to the array. Loop checks wether to update or insert new values
function save_student_meta($post_id, $post) {
    $student_meta['name'] = $_POST['name'];
    $student_meta['class'] = $_POST['class'];
    $student_meta['email'] = $_POST['email'];



    foreach($student_meta as $key => $value){
        if(get_post_meta($post->ID, $key, FALSE)){
            update_post_meta($post->ID, $key, $value); 
        }
        else {
            add_post_meta($post->ID, $key, $value);
        }
    }
}
add_action('save_post', 'save_student_meta',1,2);

/*add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) &&
    ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
    wp_redirect( home_url() );
    exit;
    }
}*/
?>