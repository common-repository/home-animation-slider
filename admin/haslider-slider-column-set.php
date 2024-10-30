<?php
/*
 * haslider slider update messages.
 *
 * @link              http://digitalkroy.com/haslider-slider
 * @since             1.0.0
 * @package           haslider-slider
 *
 * @wordpress-plugin
 */

// haslider slider all item column set
if ( ! function_exists( 'haslider_slider_slider_image_count_admin_column' ) ) :
function haslider_slider_slider_image_count_admin_column($post_ID) {
   // $haslider_slider_slider_count = get_post_meta($post_ID, 'slider_img', true);
    $slider_animation_one = get_post_meta( $post_ID, 'slider_animation_one', true );
    $slider_animation_two = get_post_meta( $post_ID, 'slider_animation_two', true );
	$slider_animation_three = get_post_meta( $post_ID, 'slider_animation_three', true );


    if ( $slider_animation_one || $slider_animation_two || $slider_animation_three ) {
        $total_one_count = count( $slider_animation_one );
        $total_two_count = count( $slider_animation_two );
        $total_three_count = count( $slider_animation_three );
        $total_sliders = ($total_one_count + $total_two_count + $total_three_count);
        return $total_sliders;
    }
   
}
endif;

if ( ! function_exists( 'haslider_slider_slider_shortcode_column_head' ) ) :
add_filter('manage_haslider-slider_posts_columns', 'haslider_slider_slider_shortcode_column_head', 10);
function haslider_slider_slider_shortcode_column_head($defaults) {
    $defaults['shortcode_generate'] = __('slider Shortcode','haslider');
    $defaults['slider_items'] = __('slider Items','haslider');
    return $defaults;
}
endif;
if ( ! function_exists( 'haslider_slider_slider_column_content' ) ) :
add_action('manage_haslider-slider_posts_custom_column', 'haslider_slider_slider_column_content', 10, 2);
function haslider_slider_slider_column_content($column_name, $post_ID) {

    if ($column_name == 'shortcode_generate') {
        $haslider_img_count = haslider_slider_slider_image_count_admin_column($post_ID);
        $shortcode_render = '[hslider id="'.$post_ID.'"]';
        
        if($haslider_img_count < 1) {
        esc_html_e('Shortcode will appear when you add Items.','haslider');
        } else {
        echo '<input style="min-width:210px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$shortcode_render.'\' />';
        }
    }
    if ($column_name == 'slider_items') {

        $haslider_img_count = haslider_slider_slider_image_count_admin_column($post_ID);
        if( $haslider_img_count == 1 ) {
            printf(esc_html('%d slider item added','haslider'), $haslider_img_count ); 
        } elseif( $haslider_img_count > 1 ) {
            printf(esc_html('%d slider items added','haslider'), $haslider_img_count ); 
        }else{
            esc_html_e(' No item added!','haslider');
        }

    }

}
endif;