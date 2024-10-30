<?php 
/*
 *   Register haslider slider post type. 
 *   This is administrator only post type. 
 *
 * @Author            Noor alam
 * @link              http://digitalkroy.com/haslider-slider
 * @since             1.0.0
 * @package           haslider slider
 *
 * @wordpress-plugin
 */
 
 if ( ! function_exists( 'haslider_slider_slider_post_type' ) ) :
function haslider_slider_slider_post_type() {
	$labels = array(
		'name'               => __( 'sliders','haslider' ),
		'singular_name'      => __( 'slider','haslider' ),
		'menu_name'          => __( 'Home ani slider','haslider' ),
		'name_admin_bar'     => __( 'Home ani slider','haslider' ),
		'add_new'            => __( 'Add New slider','haslider' ),
		'add_new_item'       => __( 'Add New slider','haslider' ),
		'new_item'           => __( 'New slider', 'haslider' ),
		'edit_item'          => __( 'Edit slider', 'haslider' ),
		'view_item'          => __( 'View slider', 'haslider' ),
		'all_items'          => __( 'All slider', 'haslider' ),
		'parent_item_colon'  => __( 'Parent slider:', 'haslider' ),
		'not_found'          => __( 'No slider found.', 'haslider' ),
		'not_found_in_trash' => __( 'No slider found in Trash.', 'haslider' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'You can create awesome image sliders with by haslider slider.', 'haslider' ),
		'public'             => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => false,
		'rewrite'            => array( 'slug' => 'haslider-slider' ),
		'capabilities' => array(
          'edit_post'          => 'edit_haslider_slider_slider', 
		  'read_post'          => 'read_haslider_slider_sliders', 
		  'delete_post'        => 'delete_haslider_slider_slider', 
		  'delete_posts'       => 'delete_haslider_slider_sliders', 
		  'edit_posts'         => 'edit_haslider_slider_sliders', 
		  'edit_others_posts'  => 'edit_haslider_others_sliders_slider', 
		  'publish_posts'      => 'publish_haslider_slider_sliders',       
		  'read_private_posts' => 'read_haslider_private_sliders_slider', 
		  'create_posts'       => 'create_haslider_slider_sliders',
		),
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 65,
		'menu_icon' => 'dashicons-tickets-alt',
		'supports'           => array( 'title')
	);

	register_post_type( 'haslider-slider', $args );

}
 add_action( 'init', 'haslider_slider_slider_post_type' );
 endif;
 
 
/*
 * Change haslider slider title placeholder
 *
 *
 */
if ( ! function_exists( 'haslider_slider_slider_title_text' ) ) :
function haslider_slider_slider_title_text( $title ){
     $screen = get_current_screen();
 
     if  ( 'haslider-slider' == $screen->post_type ) {
          $title = __('Enter slider name','haslider');
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'haslider_slider_slider_title_text' );
endif;