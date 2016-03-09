<?php
/**
 * Flat initiation
 *
 * Initializes Flat's features and includes all necessary files.
 *
 * @package Flat
 */

# Prevent direct access to this file
if ( 1 == count( get_included_files() ) ) {
	header( 'HTTP/1.1 403 Forbidden' );
	die( 'Direct access of this file is prohibited. Thank you.' );
}

/**
 * File inclusions
 */
require get_template_directory() . '/inc/customize.php'; # Enables user customization via admin panel
require get_template_directory() . '/inc/hooks.php'; # Enables user customization via WordPress plugin API
require get_template_directory() . '/inc/template-tags.php'; # Contains functions that output HTML

/**
*Custom function.php**********************************
*/

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
        'show_in_nav_menus'	 => true,	
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
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),

    );

    // Registers our custom post type with above arguments
    register_post_type('report', $args);
}

add_action('init', 'post_type_report_init');

function post_type_course_assignments_init() {
    //For dashboard view
    $labels = array(
            'name'                  => "Assignments",
            'singular_name'         => "Assignment",
            'menu_name'             => "Assignments",
            'name_admin_bar'        => "Assignments",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Assignment', 'textdomain' ),
            'new_item'              => __( 'New Assignment', 'textdomain' ),
            'edit_item'             => __( 'Edit Assignment', 'textdomain' ),
            'view_item'             => __( 'View Assignment', 'textdomain' ),
            'all_items'             => __( 'All Assignment', 'textdomain' ),
            'search_items'          => __( 'Search Assignment', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Assignment:', 'textdomain' ),
            'not_found'             => __( 'No Assignment found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Assignment found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Assignment Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Assignment archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Assignment',//_x( 'Insert into Assignment', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Assignment', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Assignments list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Assignments list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Assignments list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
    //Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'assignment' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        'register_meta_box_cb' => 'add_assignment_metabox'

    );

    // Registers our custom post type with above arguments
    register_post_type('assignment', $args);
}

add_action('init', 'post_type_course_assignments_init');

function post_type_plan_init() {
    //For dashboard view
    $labels = array(
            'name'                  => "Plan",
            'singular_name'         => "Plan",
            'menu_name'             => "Plan",
            'name_admin_bar'        => "Plan",
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Plan', 'textdomain' ),
            'new_item'              => __( 'New Plan', 'textdomain' ),
            'edit_item'             => __( 'Edit Plan', 'textdomain' ),
            'view_item'             => __( 'View Plan', 'textdomain' ),
            'all_items'             => __( 'All Plans', 'textdomain' ),
            'search_items'          => __( 'Search Plans', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Plan:', 'textdomain' ),
            'not_found'             => __( 'No Plan found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Plan found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Plan Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Plan archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => 'Insert into Plan',//_x( 'Insert into Plan', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Plan', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Plans list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Plans list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Plans list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );
    //Arguments for our new post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'plan' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    );

    // Registers our custom post type with above arguments
    register_post_type('plan', $args);
}

add_action('init', 'post_type_plan_init');

function my_connection_types() {
    p2p_register_connection_type( array( 
        'name' => 'custom_post_manager',
        'from' => 'course',
        'to' => 'assignment',
        'cardinality' => 'one-to-many',
        'title' => array( 'from' => 'Managed by', 'to' => 'Manages' )
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );

######################## Taxonomies ################################

add_action( 'init', 'add_category_taxonomy_to_course' );
function add_category_taxonomy_to_course() {
    register_taxonomy_for_object_type( 'category', 'course' );
}

add_action( 'init', 'add_category_taxonomy_to_assignment' );
function add_category_taxonomy_to_assignment() {
    register_taxonomy_for_object_type( 'category', 'assignment' );
}

########################### Custom user fields ###################################

function modify_contact_methods($profile_fields) {

    // Add new fields
    $profile_fields['twitter'] = 'Twitter Username';
    $profile_fields['facebook'] = 'Facebook URL';
    $profile_fields['gplus'] = 'Google+ URL';
    $profile_fields['phone'] = 'Phonenumber';

    return $profile_fields;
}

add_filter('user_contactmethods', 'modify_contact_methods');

################## Disables Dashboard for low-level users ############################

add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if ( is_admin() && ! current_user_can( 'edit_posts' ) &&
    ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
    wp_redirect( home_url() );
    exit;
    }
}

################## Disables admin bar for low-level users ############################

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('edit_posts') && !is_admin()) {
      show_admin_bar(false);
    }
}

################ Handles Front-end posting of students study report ################

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "report") {

    //store post vars into variables for later use
    
    $title      = wp_strip_all_tags($_POST['title']);
    $question_1 = wp_strip_all_tags($_POST['question_1']);
    $question_2 = wp_strip_all_tags($_POST['question_2']);
    $question_3 = wp_strip_all_tags($_POST['question_3']);
    $rate       = wp_strip_all_tags($_POST['rate']);
    $post_type  = 'report';
    $author     = $_POST['author'];
  

    //the array of arguments to be inserted
    $new_post = array(
    'post_title'    => $title,
    'post_status'   => 'publish',          
    'post_type'     => $post_type,
    'post_author' => $author
    );

    //inserts the post into database and stores our post ID in a variable
    // function automatically sanitizes and validates

    $pid = wp_insert_post($new_post);

    //insert data to custom fields
    update_field('field_56dd3f6c3c15c', $question_1, $pid);
    update_field('field_56dd3f9d3c15d', $question_2, $pid);
    update_field('field_56dd40903c15e', $question_3, $pid);
    update_field('field_56dd40ae3c15f', $rate, $pid);
}

################ Handles Front-end posting of students studieplan ################

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "plan") {

    $title      = $_POST['author_nickname'].'s studieplan';
    $plan       = wp_strip_all_tags($_POST['plan']);
    $post_type  = 'plan';
    $author     = $_POST['author'];

    $new_post = array(
    'post_title'    => $title,
    'post_content'  => $plan,
    'post_status'   => 'publish',          
    'post_type'     => $post_type,
    'post_author'   => $author
    );

    $pid = wp_insert_post($new_post);

}

############ Login/Logout Redirects #################

function my_login_redirect( $redirect_to, $request, $user ) {
    //is there a user to check?
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        //check for permitted roles
        if ( in_array( 'teacher', $user->roles) || in_array( 'administrator', $user->roles) || in_array( 'school_administrator', $user->roles ) ) {
            // redirect to dashboard
            $redirect_to = "/wp-admin";
            return $redirect_to;
        }
        else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

function my_logout_redirect( $redirect_to, $requested_redirect_to, $user ) {
    return $requested_redirect_to = "/";
}
add_filter( 'logout_redirect', 'my_logout_redirect', 10, 3 );

################### Default Basic nav menu ###############################

// Check if the menu exists
$qlok_menu = 'Qlokare menu';
$qlok_menu_exists = wp_get_nav_menu_object( $qlok_menu );

// Create if doesn't exists Logged in menu
if( !$qlok_menu_exists){
    $menu_id = wp_create_nav_menu($qlok_menu);

    // Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Hem'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Mina Kurser'),
        'menu-item-url' => home_url( '/course' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Mina Studierapporter'),
        'menu-item-url' => home_url( '/report' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Min Studieplan'),
        'menu-item-url' => home_url( '/plan' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Mina Inlämningar och Tentor'),
        'menu-item-url' => home_url( '/assignment' ), 
        'menu-item-status' => 'publish'));
}

// Check if the menu exists
$frontpage_menu = 'Frontpage menu';
$frontpage_menu_exists = wp_get_nav_menu_object( $frontpage_menu );

// Create if doesn't exists Not logged in menu
if( !$frontpage_menu_exists){
    $menu_id = wp_create_nav_menu($frontpage_menu);

    // Set up default menu items
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Hem'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));

    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Kurser'),
        'menu-item-url' => home_url( '/course' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Utbildningens information'),
        'menu-item-url' => home_url( '/' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Students'),
        'menu-item-url' => home_url( '/students' ), 
        'menu-item-status' => 'publish'));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' =>  __('Login'),
        'menu-item-url' => home_url( '/wp-login.php' ), 
        'menu-item-status' => 'publish'));
}

 ############### Meta ###########################

// Adds the meta-box, called from register_post_type
function add_assignment_metabox() {
    add_meta_box('assignment_meta', 'Deadline', 'assignment_meta_fields', 'assignment', 'normal', 'high');
}

// Adds content to our meta-box, called from add_meta_box
function assignment_meta_fields() {
    global $post;
?>
    Deadline <input type="datetime-local" name="deadline" value="<?php echo get_post_meta($post->ID, 'deadline', true) ?>">
<?php    
}

//Save values for meta-data. POST values for each field is added to the array. Loop checks wether to update or insert new values
function save_assignment_meta($post_id, $post) {

    $assignment_meta['deadline'] = $_POST['deadline'];

    foreach($assignment_meta as $key => $value){
        if(get_post_meta($post->ID, $key, FALSE)){
            update_post_meta($post->ID, $key, $value); 
        }
        else {
            add_post_meta($post->ID, $key, $value);
        }
    }
}
add_action('save_post', 'save_assignment_meta',1,2);

/**
*ends Custom function.php**********************
*/

/**
 * Set the max width for embedded content
 *
 * @link http://codex.wordpress.org/Content_Width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 720;
}

if ( ! function_exists( 'flat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function flat_setup() {
		# Localization
		load_theme_textdomain( 'flat', get_template_directory() . '/languages' );

		# Enable WordPress theme features
		add_theme_support( 'automatic-feed-links' ); # @link http://codex.wordpress.org/Automatic_Feed_Links
		$custom_background_support = array(
			'default-color'          => '',
			'default-image'          => get_template_directory_uri() . '/assets/img/default-background.jpg',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		
		/* tgm-plugin-activation */
        require_once get_template_directory() . '/class-tgm-plugin-activation.php';
		add_theme_support( 'custom-background', $custom_background_support ); # @link http://codex.wordpress.org/Custom_Backgrounds
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) ); # @link http://codex.wordpress.org/Post%20Formats
		add_theme_support( 'post-thumbnails' ); # @link http://codex.wordpress.org/Post%20Thumbnails
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'title-tag' ); # @link http://codex.wordpress.org/Title_Tag
		add_theme_support( 'tha-hooks', array( 'all' ) ); # @link https://github.com/zamoose/themehookalliance

		# Add style to the post editor for a more WYSIWYG experience
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		# Flat has one navigation menu; register it with WordPress
		register_nav_menu( 'primary', __( 'Navigation Menu', 'flat' ) );

		# Add filters
		add_filter( 'comments_popup_link_attributes', function() { return ' itemprop="discussionUrl"'; } ); # schema.org property on comments links
		add_filter( 'current_theme_supports-tha_hooks', '__return_true' ); # Enables checking for THA hooks
		add_filter( 'style_loader_tag', 'flat_filter_styles', 10, 2 ); # Filters style tags as needed
		add_filter( 'the_content_more_link', 'modify_read_more_link' ); # Enhances appearance of "Read more..." link
		add_filter( 'use_default_gallery_style', '__return_false' ); # Disable default WordPress gallery styling
		remove_filter( 'the_content','cwp_pac_before_content');

		# Add actions
		add_action( 'flat_html_before', 'flat_doctype' ); # Outputs HTML doctype
		add_action( 'flat_404_content', 'flat_output_404_content' ); # Outputs a helpful message on 404 pages
		add_action( 'widgets_init', 'flat_widgets_init' ); # Registers Flat's sidebar
		add_action( 'wp_enqueue_scripts', 'flat_scripts_styles' ); # Enqueue's Flat's scripts & styles
		
		add_action( 'admin_enqueue_scripts', 'flat_admin_styles', 10 );
	}
endif;
add_action( 'after_setup_theme', 'flat_setup' );

// unregister all widgets
 function flat_remove_review_widgets() {
     unregister_widget('cwp_latest_products_widget');
     unregister_widget('cwp_top_products_widget');

 }
 add_action('widgets_init', 'flat_remove_review_widgets', 11);

if ( ! function_exists( 'flat_widgets_init' ) ) :
	/**
	 * Registers our sidebar with WordPress
	 */
	function flat_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Main Widget Area', 'flat' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Appears in the sidebar section of the site', 'flat' ),
			'before_widget' => "\t\t\t\t\t" . '<aside id="%1$s" class="widget %2$s">' . "\n",
			'after_widget'  => "\t\t\t\t\t</aside>\n",
			'before_title'  => "\t\t\t\t\t\t<h3 class='widget-title'>",
			'after_title'   => "</h3>\n",
		) );
	}
endif;

if ( ! function_exists( 'flat_scripts_styles' ) ) :
	/**
	 * Sets up necessary scripts and styles
	 */
	function flat_scripts_styles() {
		global $wp_version;

		# Get the current version of Flat, even if a child theme is being used
		$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );

		# When needed, enqueue comment-reply script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		# Minified versions of CSS & JS are used, unless a development constant is set
		if ( defined( 'WP_ENV' ) && 'development' === WP_ENV ) {
			$assets = array(
				'css' => '/assets/css/flat.css',
				'js'  => '/assets/js/flat.js',
			);
		} else {
			$assets = array(
				'css' => '/assets/css/flat.min.css',
				'js'  => '/assets/js/flat.min.js',
			);
		}

		wp_enqueue_style( 'flat-fonts', flat_fonts_url(), array(), null ); # Web fonts
		wp_enqueue_style( 'flat-theme', get_template_directory_uri() . $assets['css'], array(), $version ); # Flat's styling
		wp_enqueue_script( 'flat-js', get_template_directory_uri() . $assets['js'], array( 'jquery' ), $version, false ); # Flat's scripting
		wp_enqueue_style( 'flat-style', get_stylesheet_uri() ); # Load main stylesheet, for child theme supports


		# If the `script_loader_tag` filter is unavailable, this script will be added via the `wp_head` hook
		if ( version_compare( '4.1', $wp_version, '<=' ) ) {
			wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.min.js', array(), '3.7.2', false );
		}
		
	}
endif;

function flat_admin_styles() {
	wp_enqueue_style( 'flat_admin_stylesheet', get_template_directory_uri() . '/assets/css/admin-style.css', array(), '1.1', false );
}

# The following function uses a filter introduced in WP 4.1
if ( version_compare( '4.1', $wp_version, '<=' ) ) :
	if ( ! function_exists( 'flat_filter_scripts' ) ) :
		/**
		 * Filters enqueued script output to better suit Flat's needs
		 */
		function flat_filter_scripts( $tag, $handle, $src ) {
			# Remove `type` attribute (unneeded in HTML5)
			$tag = str_replace( ' type=\'text/javascript\'', '', $tag );

			# Apply conditionals to html5shiv for legacy IE
			if ( 'html5shiv' === $handle ) {
				$tag = "<!--[if lt IE 9]>\n$tag<![endif]-->\n";
			}

			return $tag;
		}
	endif;
	add_filter( 'script_loader_tag', 'flat_filter_scripts', 10, 3 );
else : # If the `script_loader_tag` filter is unavailable...
	/**
	 * Adds html5shiv the "old" way (WP < 4.1)
	 */
	function flat_add_html5shiv() {
		echo "<!--[if lt IE 9]>\n<scr" . 'ipt src="' . esc_url( get_template_directory_uri() ) . '/assets/js/html5shiv.min.js"></scr' . "ipt>\n<![endif]-->"; # This is a hack to disguise adding the script without using WordPress' enqueue function
	}
	add_action( 'wp_head', 'flat_add_html5shiv' );
endif;

if ( ! function_exists( 'flat_filter_styles' ) ) :
	/**
	 * Filter enqueued style output to better suit HTML5
	 */
	function flat_filter_styles( $tag, $handle ) {
		# Get rid of unnecessary `type` attribute
		$tag = str_replace( ' type=\'text/css\'', '', $tag );

		# Get rid of double-spaces
		$tag = str_replace( '  ', ' ', $tag );

		return $tag;
	}
endif;

add_action('tgmpa_register', 'flat_register_required_plugins');

function flat_register_required_plugins()
{

		$plugins = array(

			array(
	 
				'name'      => 'WP Product Review',
	 
				'slug'      => 'wp-product-review',
	 
				'required'  => false,
	 
			)

		);

	 


    $config = array(

        'default_path' => '',

        'menu' => 'tgmpa-install-plugins',

        'has_notices' => true,

        'dismissable' => true,

        'dismiss_msg' => '',

        'is_automatic' => false,

        'message' => '',

        'strings' => array(

            'page_title' => __('Install Required Plugins', 'flat'),

            'menu_title' => __('Install Plugins', 'flat'),

            'installing' => __('Installing Plugin: %s', 'flat'),

            'oops' => __('Something went wrong with the plugin API.', 'flat'),

            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','flat'),

            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','flat'),

            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','flat'),

            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','flat'),

            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','flat'),

            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','flat'),

            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','flat'),

            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','flat'),

            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins','flat'),

            'activate_link' => _n_noop('Begin activating plugin', 'Begin activating plugins','flat'),

            'return' => __('Return to Required Plugins Installer', 'flat'),

            'plugin_activated' => __('Plugin activated successfully.', 'flat'),

            'complete' => __('All plugins installed and activated successfully. %s', 'flat'),

            'nag_type' => 'updated'

        )

    );
    tgmpa($plugins, $config);
}
/**
 * Enhances "Read more..." links with Bootstrap button styling
 */
function modify_read_more_link() {
	return '<a class="btn btn-default btn-sm" href="' . esc_url( get_permalink() ) . '">' . sprintf( __( 'Continue reading %s', 'flat' ), '<i class="fa fa-angle-double-right"></i></a>' );
}

//Customize Wordpress logo on login-page
function custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image: url('.get_bloginfo('template_directory').'/images/qlok-logo.jpg) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');