<?php
/*
 * Register haslider slider post type. 
 * This is administrator only post type. 
 *
 * @link              http://digitalkroy.com/haslider-slider
 * @since             1.0.0
 * @package           haslider slider
 *
 * @wordpress-plugin
 */
 
/**
 *add haslider slider administrator role
 *
 *
 */
if ( ! function_exists( 'haslider_slider_slider_admin_role' ) ) :
function haslider_slider_slider_admin_role() {
    // gets the administrator role
    $admins = get_role( 'administrator' );

    $admins->add_cap( 'edit_haslider_slider_slider' ); 
    $admins->add_cap( 'read_haslider_slider_sliders' ); 
    $admins->add_cap( 'delete_haslider_slider_slider' ); 
    $admins->add_cap( 'delete_haslider_slider_sliders' ); 
    $admins->add_cap( 'edit_haslider_slider_sliders' ); 
    $admins->add_cap( 'edit_haslider_others_sliders_slider' ); 
    $admins->add_cap( 'publish_haslider_slider_sliders' ); 
    $admins->add_cap( 'read_haslider_private_sliders_slider' ); 
    $admins->add_cap( 'create_haslider_slider_sliders' ); 
}
add_action( 'admin_init', 'haslider_slider_slider_admin_role');
endif;
/**
 *Remove haslider slider administrator role
 *
 *
 */
if ( ! function_exists( 'haslider_slider_slider_admin_role_remove' ) ) :
function haslider_slider_slider_admin_role_remove() {
    // remove administrator role
    $admins = get_role( 'administrator' );
	$admins->remove_cap( 'edit_haslider_slider_slider' ); 
    $admins->remove_cap( 'read_haslider_slider_sliders' ); 
    $admins->remove_cap( 'delete_haslider_slider_slider' ); 
    $admins->remove_cap( 'delete_haslider_slider_sliders' ); 
    $admins->remove_cap( 'edit_haslider_slider_sliders' ); 
    $admins->remove_cap( 'edit_haslider_others_sliders_slider' ); 
    $admins->remove_cap( 'publish_haslider_slider_sliders' ); 
    $admins->remove_cap( 'read_haslider_private_sliders_slider' ); 
    $admins->remove_cap( 'create_haslider_slider_sliders' ); 
}
endif;
