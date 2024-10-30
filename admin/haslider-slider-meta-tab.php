<?php
/*
 * Include and setup custom metaboxes and fields. 
 *
 * @link              http://digitalkroy.com/haslider-slider
 * @since             1.0.0
 * @package          haslider slider
 *
 * @wordpress-plugin
 */
if ( ! function_exists( 'haslider_cheackbox_default' ) ) :
function haslider_cheackbox_default( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}
endif;

//All meta show in tab
if ( ! function_exists( 'haslider_slider_slider_group_tab' ) ) :
add_action( 'cmb2_init', 'haslider_slider_slider_group_tab' );
function haslider_slider_slider_group_tab() {

	$haslider_meta = new_cmb2_box( array(
		'id'           => 'metabox-tabs',
		'title'        => __('haslider slider set-up','haslider'),
		'object_types' => array('haslider-slider'), // post type
		'context'      => 'normal',
		'priority'     => 'high',
		'tabs'      => array(
            'animation_one' => array(
                'label' => __('Animation style one', 'haslider'),
                'icon'  => 'dashicons-format-image', // Dashicon
            ),
            'animation_two' => array(
                'label' => __('Animation style two', 'haslider'),
                'icon'  => 'dashicons-format-gallery', // Dashicon
            ),
            'animation_three'    => array(
                'label' => __('Animation style three', 'haslider'),
                'icon'  => 'dashicons-welcome-view-site', 
            ),
           
        ),
	) );
	
	// slider style one
	$slider_one = $haslider_meta->add_field( array(
		'id'           => 'slider_animation_one',
		'type'         => 'group',
		'repeatable'   => true,
		'tab'  => 'animation_one',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
		'options'      => array(
			'group_title'   => 'Slider style one. item {#}',
			'add_button'    => __( 'Add new item', 'haslider' ),
             'remove_button' => __( 'Remove item', 'haslider' ),
			'sortable'      => true, // beta
			'show_as_tab'   => true,
			
		),
		'fields' => array(
				array(
					'name' => __( 'Title', 'haslider' ),
					'desc'    => __( 'Add slider title. Must fill the field. Sliders can not be seen if it is empty.', 'haslider' ),
	    			'id'   => 'slider_title',
	    			'type' => 'text',
	    			
				),
		        array(
					'name' => __( 'Add background image', 'haslider' ),
					'desc'    => __( 'Add slider image here.', 'haslider' ),
    				'id'   => 'bg_img',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ), 
					'options' => array(
						'url' => false, // Hide the text input for the url
					),
				),
		        array(
					'name' => __( 'Small image one', 'haslider' ),
					'desc'    => __( 'Add slider small image one.', 'haslider' ),
    				'id'   => 'simg_one',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ),
					'options' => array(
						'url' => false, // Hide the text input for the url
					), 
					),
		        array(
					'name' => __( 'Small image two', 'haslider' ),
					'desc'    => __( 'Add slider small image two.', 'haslider' ),
    				'id'   => 'simg_two',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ),
					'options' => array(
						'url' => false, // Hide the text input for the url
					), 
				),
				array(
					'name' => __( 'Description text', 'haslider' ),
					'desc'    => __( 'Add slider description. The slider support 6 description text animation.', 'haslider' ),
	    			'id'   => 'slider_desc',
	    			'type' => 'text',
	    			'repeatable'   => true,
						'options'      => array(
							'add_row_text' => __( 'Add more text', 'niso' ),
						),
				),
				array(
					'name' => __( 'Button text', 'haslider' ),
					'desc'    => __( 'Add slider button text.', 'haslider' ),
	    			'id'   => 'slider_btn',
	    			'type' => 'text',
				),
				array(
					'name' => __( 'Button url', 'haslider' ),
					'desc'    => __( 'Add slider button url.', 'haslider' ),
	    			'id'   => 'slider_btn_url',
	    			'type' => 'text',
				),
	
			),
	) );	
	// slider style two
	$slider_one = $haslider_meta->add_field( array(
		'id'           => 'slider_animation_two',
		'type'         => 'group',
		'repeatable'   => true,
		'tab'  => 'animation_two',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
		'options'      => array(
			'group_title'   => 'Slider style two. item {#} ',
			'add_button'    => __( 'Add new item', 'cmb2' ),
             'remove_button' => __( 'Remove item', 'cmb2' ),
			'sortable'      => true, // beta
			'show_as_tab'   => true,
			
		),
		'fields' => array(
				array(
					'name' => __( 'Title', 'haslider' ),
					'desc'    => __( 'Add slider title. Must fill the field. Sliders can not be seen if it is empty.', 'haslider' ),
	    			'id'   => 'slider_title',
	    			'type' => 'text',
	    			
				),
		        array(
					'name' => __( 'Add background image', 'haslider' ),
					'desc'    => __( 'Add slider image here.', 'haslider' ),
    				'id'   => 'bg_img',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ), 
					'options' => array(
						'url' => false, 
					),
				),
		        array(
					'name' => __( 'Small image', 'haslider' ),
					'desc'    => __( 'Add slider small image one.', 'haslider' ),
    				'id'   => 'simg_one',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ),
					'options' => array(
						'url' => false, // Hide the text input for the url
					), 
				),
		      
				array(
					'name' => __( 'Description text', 'haslider' ),
					'desc'    => __( 'Add slider description. The slider support 6 description text animation.', 'haslider' ),
	    			'id'   => 'slider_desc',
	    			'type' => 'text',
	    			'repeatable'   => true,
						'options'      => array(
							'add_row_text' => __( 'Add more text', 'haslider' ),
						),
				),
				array(
					'name' => __( 'Button text', 'haslider' ),
					'desc'    => __( 'Add slider button text.', 'haslider' ),
	    			'id'   => 'slider_btn',
	    			'type' => 'text',
				),
				array(
					'name' => __( 'Button url', 'haslider' ),
					'desc'    => __( 'Add slider button url.', 'haslider' ),
	    			'id'   => 'slider_btn_url',
	    			'type' => 'text',
				),
	
			),
	) );

		// slider style three
	$slider_one = $haslider_meta->add_field( array(
		'id'           => 'slider_animation_three',
		'type'         => 'group',
		'repeatable'   => true,
		'tab'  => 'animation_three',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
		'options'      => array(
			'group_title'   => 'Slider style three. item {#}',
			'add_button'    => __( 'Add new item', 'haslider' ),
             'remove_button' => __( 'Remove item', 'haslider' ),
			'sortable'      => true, // beta
			'show_as_tab'   => true,
			
		),
		'fields' => array(
				array(
					'name' => __( 'Title', 'haslider' ),
					'desc'    => __( 'Add slider title. Must fill the field. Sliders can not be seen if it is empty.', 'haslider' ),
	    			'id'   => 'slider_title',
	    			'type' => 'text',
	    			
				),
		        array(
					'name' => __( 'Add background image', 'haslider' ),
					'desc'    => __( 'Add slider image here.', 'haslider' ),
    				'id'   => 'bg_img',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ), 
					'options' => array(
						'url' => false, // Hide the text input for the url
					),
				),
		        array(
					'name' => __( 'Small image one', 'haslider' ),
					'desc'    => __( 'Add slider small image one.', 'haslider' ),
    				'id'   => 'simg_one',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ),
					'options' => array(
						'url' => false, // Hide the text input for the url
					), 
					),
		        array(
					'name' => __( 'Small image two', 'haslider' ),
					'desc'    => __( 'Add slider small image two.', 'haslider' ),
    				'id'   => 'simg_two',
    				'type' => 'file',
					'preview_size' => array( 100, 100 ),
					'options' => array(
						'url' => false, // Hide the text input for the url
					), 
				),
				array(
					'name' => __( 'Description text', 'haslider' ),
					'desc'    => __( 'Add slider description. The slider support 6 description text animation.', 'haslider' ),
	    			'id'   => 'slider_desc',
	    			'type' => 'text',
	    			'repeatable'   => true,
						'options'      => array(
							'add_row_text' => __( 'Add more text', 'niso' ),
						),
				),
				array(
					'name' => __( 'Button text', 'haslider' ),
					'desc'    => __( 'Add slider button text.', 'haslider' ),
	    			'id'   => 'slider_btn',
	    			'type' => 'text',
				),
				array(
					'name' => __( 'Button url', 'haslider' ),
					'desc'    => __( 'Add slider button url.', 'haslider' ),
	    			'id'   => 'slider_btn_url',
	    			'type' => 'text',
				),
	
			),
	) );	





}
endif;
