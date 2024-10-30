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
 * haslider slider update messages.
 *
 *
 */
 if ( ! function_exists( 'haslider_slider_slider_updated_messages' ) ) :
function haslider_slider_slider_updated_messages( $messages ) {
	global $post;
    $post_ID = $post->ID;
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );
	$pslider_shortcode = '[hslider id="'.$post_ID.'"]';
	$messages['haslider-slider'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __('slider updated. Shortcode is:','haslider').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$pslider_shortcode.'\' />',
		2  => __( 'slider field updated. Shortcode is:', 'haslider').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$pslider_shortcode.'\' />',
		3  => __( 'slider field deleted.', 'haslider' ),
		4  => __( 'slider item updated.', 'haslider' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'slider restored to revision from %s', 'haslider' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  =>  __('slider published. Shortcode is:','haslider').'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$pslider_shortcode.'\' />',
		7  => __( 'slider saved.', 'haslider' ).'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$pslider_shortcode.'\' />',
		8  => __( 'slider submitted.', 'haslider' ).'<input style="min-width:165px" type=\'text\' onClick=\'this.setSelectionRange(0, this.value.length)\' value=\''.$pslider_shortcode.'\' />',
		9  => sprintf(
			__( 'slider item scheduled for: <strong>%1$s</strong>.', 'haslider' ),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i', 'haslider' ), strtotime( $post->post_date ) )
		),
		10 => __( 'slider draft updated.', 'haslider' )
	);


	return $messages;
}
add_filter( 'post_updated_messages', 'haslider_slider_slider_updated_messages' );
 endif;