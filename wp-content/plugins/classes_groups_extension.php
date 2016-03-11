<?php
/*
Plugin Name: Classes | A Groups Extension
Plugin URI: http://www.qlok.se
Description: Probably the best plugin in the world!
Author: Lucky Number Seven
Version: 1.0
Author URI: http://www.qlok.se
*/

function classes_groups_extension_admin_page() {

?>

<div class="wrap">

    <?php

    classes_admin_groups_add();
    print_classes();
    classes_admin_groups_add_submit();
    
    ?>

</div>

<?php

}

/**
 * Show add group form.
 */
function classes_admin_groups_add() {

    global $wpdb;

    $output = '';

    if ( !current_user_can( GROUPS_ADMINISTER_GROUPS ) ) {
        wp_die( __( 'Access denied.', GROUPS_PLUGIN_DOMAIN ) );
    }

    $current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current_url = remove_query_arg( 'paged', $current_url );
    $current_url = remove_query_arg( 'action', $current_url );
    $current_url = remove_query_arg( 'group_id', $current_url );

    $parent_id   = isset( $_POST['parent-id-field'] ) ? $_POST['parent-id-field'] : '';
    $name        = isset( $_POST['name-field'] ) ? $_POST['name-field'] : '';
    $description = isset( $_POST['description-field'] ) ? $_POST['description-field'] : '';

    $group_table = _groups_get_tablename( 'group' );
    $parent_select = '<select name="parent-id-field">';
    $parent_select .= '<option value="">--</option>';
    
    $output .= '<div class="manage-groups wrap">';
    $output .= '<h1>';
    $output .= __( 'Add a new class', GROUPS_PLUGIN_DOMAIN );
    $output .= '</h1>';

    $output .= Groups_Admin::render_messages();

    $output .= '<form id="add-group" action="' . esc_url( $current_url ) . '" method="post">';
    $output .= '<div class="group new">';

    $output .= '<div class="field">';
    $output .= '<label for="name-field" class="field-label first required">';
    $output .= __( 'Name', GROUPS_PLUGIN_DOMAIN );
    $output .= '</label>';
    $output .= '<input id="name-field" name="name-field" class="namefield" type="text" value="' . esc_attr( stripslashes( $name ) ) . '"/>';
    $output .= '</div>';

    $output .= apply_filters( 'groups_admin_groups_add_form_after_fields', '' );

    $output .= '<div class="field">';
    $output .= wp_nonce_field( 'groups-add', GROUPS_ADMIN_GROUPS_NONCE, true, false );
    $output .= '<input class="button button-primary" type="submit" value="' . __( 'Add', GROUPS_PLUGIN_DOMAIN ) . '"/>';
    $output .= '<input type="hidden" value="add" name="action"/>';
    $output .= '<a class="cancel button" href="' . esc_url( $current_url ) . '">' . __( 'Cancel', GROUPS_PLUGIN_DOMAIN ) . '</a>';
    $output .= '</div>';
    $output .= '</div>'; // .group.new
    $output .= '</form>';
    $output .= '</div>'; // .manage-groups

    echo $output;
} // function groups_admin_groups_add

function print_classes() {
    global $wpdb;

    $group_table = _groups_get_tablename( 'group' );
    $groups = $wpdb->get_results( "SELECT * FROM $group_table" );
    foreach ( $groups as $group ) {
        $output .= '<p>'  . wp_filter_nohtml_kses( $group->name ) . '</p>';
    }

    echo $output;
}

function print_latest_class() {
    global $wpdb;

    $group_table = _groups_get_tablename( 'group' );
    $groups = $wpdb->get_results( "SELECT * FROM $group_table ORDER BY wp_groups_group.datetime DESC LIMIT 1 " );
    foreach ( $groups as $group ) {
        $output .= '<p>'  . wp_filter_nohtml_kses( $group->name ) . '</p>';
    }

    echo $output;
}

function classes_admin_groups_add_submit() {

    global $wpdb;

    $creator_id  = get_current_user_id();
    $datetime    = date( 'Y-m-d H:i:s', time() );
    $parent_id   = isset( $_POST['parent-id-field'] ) ? $_POST['parent-id-field'] : null;
    $description = isset( $_POST['description-field'] ) ? $_POST['description-field'] : '';
    $name        = isset( $_POST['name-field'] ) ? $_POST['name-field'] : null;

    wp_insert_term(
        "$name",
        'category',
        array(
          'description' => 'This is the category for '.$name.' class',
          'slug'        => "$name"
        )
    );

    $group_id = Groups_Group::create( compact( "creator_id", "datetime", "parent_id", "description", "name" ) );
    if ( $group_id ) {
        if ( !empty( $_POST['capability_ids'] ) ) {
            $caps = $_POST['capability_ids'];
            foreach( $caps as $cap ) {
                Groups_Group_Capability::create( array( 'group_id' => $group_id, 'capability_id' => $cap ) );
            }
        }
        do_action( 'groups_admin_groups_add_submit_success', $group_id );
    } else {
        if ( !$name ) {
            Groups_Admin::add_message( __( 'The name must not be empty.', GROUPS_PLUGIN_DOMAIN ), 'error' );
        } else if ( Groups_Group::read_by_name( $name ) ) {
            Groups_Admin::add_message( sprintf( __( 'The <em>%s</em> group already exists.', GROUPS_PLUGIN_DOMAIN ), stripslashes( wp_filter_nohtml_kses( ( $name ) ) ) ), 'error' );
        }
    }

    return $group_id;
} // function groups_admin_groups_add_submit 

function classes_groups_extension_admin_menu(){
    
    add_menu_page( 'Class manager', 'Classes', 'manage_options', 'classes_groups_extension', 'classes_groups_extension_admin_page', '', '35'
    );
}

add_action('admin_menu', 'classes_groups_extension_admin_menu'); 
add_action('groups_admin_groups_add_submit_success','print_latest_class');