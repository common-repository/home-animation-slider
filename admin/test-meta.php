<?php
/*
 * All metabox create here.
 *
 * @link              http://awesomebootstrap.net
 * @since             1.0.0
 * @package           Gallery box wordpress plugin
 */

//add group fields 

/**
 * Hook in and add a metabox to demonstrate grouped fields
 */
 if ( ! function_exists( 'gbox_meta_group' ) ) :
function gbox_meta_group() {
	/**
	 *  Gallery box meta field groups
	 */
	$gallery_box_meta = new_cmb2_box( array(
		'id'           => 'm_gallery',
		'title'        => __( 'Choose gallery type and click to add item', 'gbox' ),
		'object_types' => array( 'page', ),
        'context'    => 'advanced',
		'priority'   => 'high',
		'tabs'      => array(
            
            'gbox_welcome' => array(
                'label' => __('Welcome tab', 'gbox'),
               // 'show_on_cb' => 'cmb2_tabs_show_if_front_page',
                'icon'  => 'dashicons-format-image', // Dashicon
            ),
            'simg' => array(
                'label' => __('Simple image', 'gbox'),
               // 'show_on_cb' => 'cmb2_tabs_show_if_front_page',
                'icon'  => 'dashicons-format-image', // Dashicon
            ),
            'image' => array(
                'label' => __('Advance Image', 'gbox'),
               // 'show_on_cb' => 'cmb2_tabs_show_if_front_page',
                'icon'  => 'dashicons-format-image', // Dashicon
            ),
            'youtube'  => array(
                'label' => __('Youtube gallery', 'gbox'),
                'icon'  => 'dashicons-video-alt2', // Dashicon
            ),
            'vimeo'    => array(
                'label' => __('Vimeo gallery', 'gbox'),
                'icon'  => 'dashicons-video-alt', // Custom icon, using image
            ),
            'sound'    => array(
                'label' => __('Soundcloud gallery', 'gbox'),
                'icon'  => 'dashicons-format-audio', // Custom icon, using image
            ),
            'iframe'    => array(
                'label' => __('iframe gallery', 'gbox'),
                'icon'  => 'dashicons-welcome-view-site', // Custom icon, using image
            ),
            'settings'    => array(
                'label' => __('Gallery settings', 'gbox'),
                'icon'  => 'dashicons-admin-generic', // Custom icon, using image
            ),
            'donation'    => array(
                'label' => __('Donation', 'gbox'),
                'icon'  => 'dashicons-visibility', // Custom icon, using image
            ),
        ),
	) );

	/*
	* welcome tab
	*
	*/
	/*global $post;
	$post_ID = $post->ID;
	$gbox_img_main = get_post_meta($post_ID, 'img_main', true);
$image_title =  !empty( $gbox_img_main[0]['image_title'])  ? $gbox_img_main[0]['image_title'] : '';*/
	$gallery_box_meta->add_field(array(
		'name'       => '',
        'desc'       => __( ' 
        <div class="gboxwelcome-text"> 
        <div class="gboxwel-img"> 
            <img src="'.plugin_dir_url( dirname( __FILE__ ) ) . 'images/image-small.jpg'.'" alt="" />
        </div>
            <div class="gboxwel-text">
            <h1>Welcome Gallery Box</h1>
            <h3>Select your gallery tab</h3>
           <p>Only add gallery items in your selected gallery and ignor all other tab.</p> 
            </div>
        </div>'

        , 'gbox' ),
        'id'         => 'gbox_wel',
        'type'       => 'text',
        'tab'  => 'gbox_welcome',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        
	) );



	/*
	* Simple image gallery
	*
	*/
	$gallery_box_meta->add_field(array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'simg_type',
        'type' => 'radio_image',
        'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'options' => array(
			'img_add' => __( 'Add images', 'gbox' ),
			'img_set'   => __( 'Setting', 'gbox' ),
		),
		'default' => 'img_add',
		
    ));

    $gallery_box_meta->add_field(array(
		'name' => __( 'Add Gallery Images', 'gbox' ),
		'desc' => __( 'You can add all gallery images by this options', 'gbox' ),
		'id'   => 'simple_imgs',
		'type' => 'file_list',
		'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_add',

		),

	) );
	$gallery_box_meta->add_field(array(
		'name'             => __( 'Image gallery type', 'gbox' ),
		'desc'             => __( 'Select image type normal or justify.', 'gbox' ),
		'id'               => 'simg_layout_type',
		'type'             => 'pw_select',
		'default'          => 'normal_layout',
		'options'          => array(
			'normal_layout'   => __( 'Normal gallery layout ', 'gbox' ),
			'justify_layout'   => __( 'justify layout', 'gbox' ),
		
		),
		'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
	) );

	 $gallery_box_meta->add_field(array(
		'name'             => __( 'Image gallery column', 'gbox' ),
		'desc'             => __( 'Set image gallery column for this image gallery. Image column not work in justify gallery.', 'gbox' ),
		'id'               => 'simg_column',
		'type'             => 'pw_select',
		'default'          => 'default',
		'options'          => array(
			'default'  => __( 'Default','gbox' ),
			1  => __( 'one column','gbox' ),
            2  => __( 'Two column','gbox' ),
            3  => __( 'Three column','gbox' ),
            4  => __( 'Four column','gbox' ),
		
		),
        'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
	) );
	$gallery_box_meta->add_field(array(
		'name'             => __( 'Image height type', 'gbox' ),
		'desc'             => __( 'Set image gallery height type. ', 'gbox' ),
		'id'               => 'simg_height',
		'type'             => 'pw_select',
		'default'          => 'auto_height',
		'options'          => array(
			'auto_height'   => __( 'Auto height', 'gbox' ),
			'custom_height'   => __( 'Custom height', 'gbox' ),
		
		),
        'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
	) );
    
	$gallery_box_meta->add_field(array(
		'name'             => __( 'Set images height', 'gbox' ),
		'desc'             => __( 'Image height very important for justify gallery.Image number set by gallery image height in justify gallery. If only work this height value for  normal gallery when set custom height in image gallery height.', 'gbox' ),
		'id'               => 'simg_custom_height',
		'type'        => 'own_slider',
		'min'         => '0',
		'max'         => '1000',
		'default'     => '220', // start value
		'value_label' => __('px:','gbox'),
		'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
        
	) );
    $gallery_box_meta->add_field(array(
		'name'             => __( 'Image gallery lightbox', 'gbox' ),
		'desc'             => __( 'You may set lightbox only overlay or lihghtbox and link overlay or set image only gallery.', 'gbox' ),
		'id'               => 'simg_lightbox',
		'type'             => 'pw_select',
		'default'          => 'light_show',
		'options'          => array(
			'light_show'   => __( 'Lightbox active', 'gbox' ),
			'light_hide'   => __( 'Lightbox hide', 'gbox' ),
		
		),
		'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
	) );

    $gallery_box_meta->add_field(array(
		'name'             => __( 'Load more button', 'gbox' ),
		'desc'             => __( 'You can active or hide load more button for this image gallery.', 'gbox' ),
		'id'               => 'simg_loadmore',
		'type'             => 'pw_select',
		'default'          => 'disable',
		'options'          => array(
			'default'   => __( 'Default', 'gbox' ),
			'enable'  => __( 'Enable','gbox' ),
            'disable'  => __( 'Disable','gbox' ),
		
		),
		'tab'  => 'simg',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_row_cb'),
        'attributes' => array(
			'data-conditional-id' => 'simg_type',
			'data-conditional-value' => 'img_set',

		),
	) );

	/*
	 * Advance Image all meta options set here.
	 */
$image_group_id = $gallery_box_meta->add_field( array(
        'id'          => 'img_main',
        'type'        => 'group',
        'tab'  => 'image',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Advance Image gallery item {#}', 'gbox' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' => __( 'Remove Entry', 'gbox' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

/*	$image_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'img_main',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'Image gallery item {#}', 'gbox' ),
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' =>  __( 'Remove', 'gbox' ),
            'closed'     => false,
            'sortable'      => true,
		),
        'tab'  => 'image',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );*/
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Enter Gallery item title', 'gbox' ),
		'desc' => __( 'Set Your gallery item title here.', 'gbox' ),
		'id'   => 'image_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Set Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.', 'gbox' ),
		'id'   => 'image_small',
		'type' => 'file',
	) );
	$gallery_box_meta->add_group_field( $image_group_id, array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'advance_options',
        'type' => 'radio_image',
        'options' => array(
			'show_adv' => __( 'Show advance options', 'gbox' ),
			'hide_adv'   => __( 'Hide advance options', 'gbox' ),
		),
		'default' => 'hide_adv',
		
    ));

    $gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Enter link url', 'gbox' ),
		'desc' => __( 'Please type or past your link url here. <strong>Note:</strong> Please make sure in gallery settings tab that image gallery type link and lightbox set.', 'gbox' ),
		'id'   => 'link_url',
		'type' => 'text_url',
		'attributes' => array(
			'data-conditional-id' => 'advance_options',
			'data-conditional-value' => 'show_adv',

		),
        
	) );
    
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name' => __( 'Set lightbox Image', 'gbox' ),
		'desc' => __( 'This image show when lightbox open.If you don\'t set this image, gallery image will be open lightbox.', 'gbox' ),
		'id'   => 'image_light',
		'type' => 'file',
		'attributes' => array(
			'data-conditional-id' => 'advance_options',
			'data-conditional-value' => 'show_adv',

		),
        
	) );
	
	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name'       => __( 'Enter image lightbox caption', 'gbox' ),
		'desc' 		=> __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'img_caption',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'advance_options',
			'data-conditional-value' => 'show_adv',

		),
       
	) );

	$gallery_box_meta->add_group_field( $image_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small. <strong>Note:</strong> Button text only show lightbox only mode. Default button text is( view large ).', 'gbox' ),
		'id'         => 'img_btn_text',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'advance_options',
			'data-conditional-value' => 'show_adv',

		),
	) );



	/*
	 *Youtube all options meta set here.
	 */
	$Youtube_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'youtube_main',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'Video gallery item  {#}', 'gbox' ), 
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' =>  __( 'Remove', 'gbox' ),
            'closed'     => false,
             'sortable'      => true,
            ),
        'before_group'       => '<div id="youtube_maintab">',
        'after_group'        => '</div>',
        'tab'  => 'youtube',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name' => __( 'Enter Gallery item title', 'gbox' ),
		'desc' => __( 'Youtube Gallery item title enter here. ', 'gbox' ),
		'id'   => 'you_title',
		'type' => 'text',
		'allow' => array( 'url', 'attachment' )

	) );
   
	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter video ID', 'gbox' ),
		'desc' 		=> __( 'Do not use video id field.Please use youtube video link field for video add. This field will be deleted next version. ', 'gbox' ),
		'id'         => 'you_id',
		'type'       => 'text',
	) );
	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Youtube video link', 'gbox' ),
		'desc' 		=> __( 'Past or type Youtube video link. Go your Youtube url and copy link and past in this box.', 'gbox' ),
		'id'         => 'you_url',
		'type'       => 'oembed',
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'you_advance',
        'type' => 'radio_image',
        'options' => array(
			'show_adv' => __( 'Show advance options', 'gbox' ),
			'hide_adv'   => __( 'Hide advance options', 'gbox' ),
		),
		'default' => 'hide_adv',
		
    ));

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name' => __( 'Set Youtube Gallery Image', 'gbox' ),
		'desc' => __( '(optional) This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column.Default image is ( Youtube default image)', 'gbox' ),
		'id'   => 'you_image',
		'type' => 'file',
		'allow' => array( 'url', 'attachment' ),
		'attributes' => array(
			'data-conditional-id' => 'you_advance',
			'data-conditional-value' => 'show_adv',

		),

	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter video lightbox caption', 'gbox' ),
		'desc' 		=> __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'You_caption',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'you_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );
	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter youtube video width', 'gbox' ),
		'desc' 		=> __( 'Youtube video lightbox width. Default width 600 )', 'gbox' ),
		'id'         => 'you_width',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id' => 'you_advance',
			'data-conditional-value' => 'show_adv',
			),
	
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter youtube video height', 'gbox' ),
		'desc' 		=> __( 'Youtube video lightbox height. Default height 400 )', 'gbox' ),
		'id'         => 'you_height',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*', 
			'data-conditional-id' => 'you_advance',
			'data-conditional-value' => 'show_adv',
			),
		
	) );

	$gallery_box_meta->add_group_field( $Youtube_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small.Default button text is( Show video )', 'gbox' ),
		'id'         => 'youtube_button',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'you_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );


	/*
	 *vimeo all options meta options.
	 */
	$vimeo_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'vimeo_main',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'Video gallery item  {#}', 'gbox' ),
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' =>  __( 'Remove', 'gbox' ),
            'closed'     => false,
            'sortable'      => true,
            ),
        'before_group'       => '<div id="vimeo_maintab">',
        'after_group'        => '</div>',
        'tab'  => 'vimeo',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Vimeo gallery item title enter here.', 'gbox' ),
		'id'   => 'vimeo_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video ID', 'gbox' ),
		'desc' => __( 'Do not use video id field.Please use vimeo video link field for video add. This field will be deleted next version..', 'gbox' ),
		'id'         => 'vimeo_id',
		'type'       => 'text',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Vimeo video link', 'gbox' ),
		'desc' 		=> __( 'Past or type vimeo video url. Go vimeo video url and copy link and past link in this box.', 'gbox' ),
		'id'         => 'vimeo_url',
		'type'       => 'oembed',
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'vimeo_advance',
        'type' => 'radio_image',
        'options' => array(
			'show_adv' => __( 'Show advance options', 'gbox' ),
			'hide_adv'   => __( 'Hide advance options', 'gbox' ),
		),
		'default' => 'hide_adv',
		
    ));
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name' => __( 'Set Vimeo Gallery Image', 'gbox' ),
		'desc' => __( '(optional) This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.Default image is ( Vimeo default image )', 'gbox' ),
		'id'   => 'vimeo_image',
		'type' => 'file',
		'attributes' => array(
			'data-conditional-id' => 'vimeo_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter lightbox caption', 'gbox' ),
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.', 'gbox' ),
		'id'         => 'vimeo_caption',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'vimeo_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );


	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video width', 'gbox' ),
		'desc' => __( 'Vimeo video lightbox width. Default width 600)', 'gbox' ),
		'id'         => 'vim_width',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id' => 'vimeo_advance',
				'data-conditional-value' => 'show_adv',
	     	)
     			
	) );
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter Vimeo video height', 'gbox' ),
		'desc' => __( 'Vimeo video lightbox height. Default height 400)', 'gbox' ),
		'id'         => 'vim_height',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id' => 'vimeo_advance',
			'data-conditional-value' => 'show_adv',
			)
	) );
	
	$gallery_box_meta->add_group_field( $vimeo_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' 		=> __( 'Button text must be small.Default button text is( Show video )', 'gbox' ),
		'id'         => 'vimeo_button',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'vimeo_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );

	/*
	 * Soundcloud audio gallery  meta options.
	 */

	$Soundcloud_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'Soundcloud_main',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'Soundcloud audio gallery item  {#}', 'gbox' ),
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' =>  __( 'Remove', 'gbox' ),
            'closed'     => false,
            'sortable'      => true,
            ),
        'before_group'       => '<div id="Soundcloud_maintab">',
        'after_group'        => '</div>',
        'tab'  => 'sound',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Soundcloud gallery item title enter here.', 'gbox' ),
		'id'   => 'sound_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter Soundcloud track id', 'gbox' ),
		'desc' => __( 'First select Soundcloud audio then copy audio id   from share button.', 'gbox' ),
		'id'         => 'sound_id',
		'type'       => 'text',
	) );
	
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name' => __( 'Set Soundcloud Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column. All images use same size for better view.', 'gbox' ),
		'id'   => 'sound_image',
		'type' => 'file',
		
	) );

	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'sound_advance',
        'type' => 'radio_image',
        'options' => array(
			'show_adv' => __( 'Show advance options', 'gbox' ),
			'hide_adv'   => __( 'Hide advance options', 'gbox' ),
		),
		'default' => 'hide_adv',
		
    ));
		
	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter Soundtrack lightbox caption', 'gbox' ),
		'id'         => 'Sound_caption',
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'sound_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );


	$gallery_box_meta->add_group_field( $Soundcloud_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' => __( 'Button text must be small.Default button text is( Listen song )', 'gbox' ),
		'id'         => 'Soundcloud_btn',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'sound_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );


	/*
	 * Iframe gallery  meta options.
	 */
	$iframe_group_id = $gallery_box_meta->add_field( array(
		'id'          => 'iframe_main',
		'type'        => 'group',
		'options'     => array(
            'group_title'   => __( 'iframe gallery item  {#}', 'gbox' ), // since
            'add_button'    => __( 'Add more', 'gbox' ),
            'remove_button' =>  __( 'Remove', 'gbox' ),
            'closed'     => false,
            'sortable'      => true,
            ),
        'before_group'       => '<div id="iframe_maintab">',
        'after_group'        => '</div>',
        'tab'  => 'iframe',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name' => __( 'Enter gallery item title', 'gbox' ),
		'desc' => __( 'Iframe gallery item title enter here.', 'gbox' ),
		'id'   => 'iframe_title',
		'type' => 'text',
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name' => __( 'Set Iframe Gallery Image', 'gbox' ),
		'desc' => __( 'This image show in front.Image size (300*300) for 4 column,(450*450) for 3 column, (600*600) for 2 column.All images use same size for better view.', 'gbox' ),
		'id'   => 'Iframe_image',
		'type' => 'file',
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter page url', 'gbox' ),
		'desc'        =>  __('Copy your webpage url and past this box.', 'gbox' ),
		'id'         => 'iframe_url',
		'type'       => 'text_url',
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
        'name' => esc_html__('', 'gbox'),
        'id'   => 'iframe_advance',
        'type' => 'radio_image',
        'options' => array(
			'show_adv' => __( 'Show advance options', 'gbox' ),
			'hide_adv'   => __( 'Hide advance options', 'gbox' ),
		),
		'default' => 'hide_adv',
		
    ));	
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter lightbox iframe caption', 'gbox' ),
		'desc' => __( 'Set your lightbox caption.You can hide or show caption by lightbox settings.Default caption is item title', 'gbox' ),
		'id'         => 'iframe_caption',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'iframe_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );

	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter iframe width', 'gbox' ),
		'desc' => __( 'Iframe lightbox width. Default width 600)', 'gbox' ),
		'id'         => 'iframe_width',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id' => 'iframe_advance',
			'data-conditional-value' => 'show_adv',
		),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter iframe height', 'gbox' ),
		'desc' => __( 'Iframe lightbox height. Default height 400)', 'gbox' ),
		'id'         => 'iframe_height',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
			'pattern' => '\d*',
			'data-conditional-id' => 'iframe_advance',
			'data-conditional-value' => 'show_adv',
		),
	) );
	$gallery_box_meta->add_group_field( $iframe_group_id, array(
		'name'       => __( 'Enter button text', 'gbox' ),
		'desc' => __( 'Button text must be small.Default button text is( SHOW IFRAME )', 'gbox' ),
		'id'         => 'iframe_button',
		'type'       => 'text',
		'attributes' => array(
			'data-conditional-id' => 'iframe_advance',
			'data-conditional-value' => 'show_adv',

		),
	) );

	/*
	 * gallery settings meta options.
	 */
	$settings_group = $gallery_box_meta->add_field( array(
		'id'          => 'settings_main',
		'type'        => 'group',
        'repeatable'  => false,
		'options'     => array(
        'group_title'   => __( 'Gallery settings', 'gbox' ), // since
        'closed'     => false,
		),
        'before_group'       => '<div id="settings_maintab">',
        'after_group'        => '</div>',
        'tab'  => 'settings',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );
    
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( '', 'gbox' ),
		'desc'             => __( 'This settings only image gallery.Next version more setting will be added.', 'gbox' ),
		'type'               => 'text',
		'id'               => '_thistype',
        
		
	) );
	
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Image gallery type', 'gbox' ),
		'desc'             => __( 'You may set simple or justify gallery layout gallery. Image number will be defend image height for justify layout. <strong>warning:</strong>Some hover effects not good for justify gallery.', 'gbox' ),
		'id'               => 'layout_type',
		'type'             => 'pw_select',
		'default'          => 'n_gallery',
		'options'          => array(
			'n_gallery'   => __( 'Normal gallery layout ', 'gbox' ),
			'j_gallery'   => __( 'justify layout', 'gbox' ),
		
		),
	) );
    $gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Image gallery column', 'gbox' ),
		'desc'             => __( 'Set image gallery column for this image gallery.', 'gbox' ),
		'id'               => 'uni_img_column',
		'type'             => 'pw_select',
		'default'          => 'default',
		'options'          => array(
			'default'  => __( 'Default','gbox' ),
			1  => __( 'one column','gbox' ),
            2  => __( 'Two column','gbox' ),
            3  => __( 'Three column','gbox' ),
            4  => __( 'Four column','gbox' ),
		
		),
        'attributes' => array(
			'data-conditional-id' => 'layout_type',
			'data-conditional-value' => 'n_gallery',

		)
	) );
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Image height type', 'gbox' ),
		'desc'             => __( 'Set image gallery height type. ', 'gbox' ),
		'id'               => 'img_height',
		'type'             => 'pw_select',
		'default'          => 'auto_height',
		'options'          => array(
			'auto_height'   => __( 'Auto height', 'gbox' ),
			'custom_height'   => __( 'Custom height', 'gbox' ),
		
		),
        'attributes' => array(
			'data-conditional-id' => 'layout_type',
			'data-conditional-value' => 'n_gallery',

		)
	) );
    
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Set images height', 'gbox' ),
		'desc'             => __( 'Image height very important for justify gallery.Image number set by gallery image height in justify gallery. If only work this height value for  normal gallery when set custom height in image gallery height.', 'gbox' ),
		'id'               => 'img_custom_height',
		'type'        => 'own_slider',
		'min'         => '0',
		'max'         => '1000',
		'default'     => '220', // start value
		'value_label' => __('px:','gbox'),
		
	) );
    $gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Image gallery overlay', 'gbox' ),
		'desc'             => __( 'You may set lightbox only overlay or lihghtbox and link overlay or set image only gallery.', 'gbox' ),
		'id'               => 'gbox_img_link_type',
		'type'             => 'pw_select',
		'default'          => 'light',
		'options'          => array(
			'light'   => __( 'Lightbox only', 'gbox' ),
			'link_only'   => __( 'Link only', 'gbox' ),
			'link_light'   => __( 'Link and lightbox', 'gbox' ),
			'tit_only'   => __( 'Title only gallery', 'gbox' ),
			'img_only'   => __( 'Image only gallery', 'gbox' ),
		
		),
	) );
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Select hover animation', 'gbox' ),
		'desc'             => __( 'This hover animation only for this image gallery. This animation not work in image only gallery.', 'gbox' ),
		'id'               => 'uni_img_hover',
		'type'             => 'pw_select',
		'default'          => 'default',
		'options'          => array(
						'default' => __( 'Default', 'gbox' ),
						'ehover1' => __( 'Animation One', 'gbox' ),
						'ehover2'   => __( 'Animation Two', 'gbox' ),
						'ehover3'     => __( 'Animation Three', 'gbox' ),
						'ehover4'     => __( 'Animation Four', 'gbox' ),
						'ehover5'     => __( 'Animation Five', 'gbox' ),
						'ehover6'     => __( 'Animation Six', 'gbox' ),
						'ehover7'     => __( 'Animation Seven', 'gbox' ),
						'ehover8'     => __( 'Animation Eight', 'gbox' ),
						'ehover9'     => __( 'Animation Nine', 'gbox' ),
						'ehover10'     => __( 'Animation Ten', 'gbox' ),
						'ehover11'     => __( 'Animation Eleven', 'gbox' ),
						'ehover12'     => __( 'Animation Twelve', 'gbox' ),
						'ehover13'     => __( 'Animation Thirteen', 'gbox' ),
						'ehover14'     => __( 'Animation Fourteen', 'gbox' ),
						'ehover1v2'     => __( 'Animation Fifteen', 'gbox' ),
						'ehover42'     => __( 'Animation Sixteen', 'gbox' ),
						),
           
	) );
	
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Item margin right', 'gbox' ),
		'desc'             => __( 'Your image gallery item right margin set by px.', 'gbox' ),
		'id'               => 'img_right_margin',
		'type'        => 'own_slider',
		'min'         => '0',
		'max'         => '50',
		'default'     => '0', // start value
		'value_label' => __('px:','gbox'),
		
	) );
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Item margin bottom', 'gbox' ),
		'desc'             => __( 'Your image gallery item bottom margin set by px.', 'gbox' ),
		'id'               => 'img_bottom_margin',
		'type'        => 'own_slider',
		'min'         => '0',
		'max'         => '50',
		'default'     => '0', // start value
		'value_label' => __('px:','gbox'),
		
	) );
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Load more button for this gallery', 'gbox' ),
		'desc'             => __( 'You may enable or disable load more button for this image gallery.', 'gbox' ),
		'id'               => 'uniqe_loadmore',
		'type'             => 'pw_select',
		'default'          => 'default',
		'options'          => array(
			'default'   => __( 'Default', 'gbox' ),
			'enable'  => __( 'Enable','gbox' ),
            'disable'  => __( 'Disable','gbox' ),
		
		),
	) );
	$gallery_box_meta->add_group_field( $settings_group, array(
		'name'             => __( 'Custom css', 'gbox' ),
		'desc'             => __( 'Enter your custom css code here.This css code only for this gallery.', 'gbox' ),
		'id'               => 'custom_css',
		'type'             => 'textarea_code',
		'default'          => '#boxGallery {letter-spacing: 2px;}',
        
	) );
    $help_groupe = $gallery_box_meta->add_field( array(
		'id'          => 'gbox_help',
		'type'        => 'group',
        'repeatable'  => false,
		'options'     => array(
        'group_title'   => __( 'Donation', 'gbox' ), // since
        'closed'     => false,
		),
        'before_group'       => '<div id="gbox_helptab">',
        'after_group'        => '</div>',
        'tab'  => 'donation',
        'render_row_cb' => array('CMB2_Tabs', 'tabs_render_group_row_cb'),
	) );
    $gallery_box_meta->add_group_field( $help_groupe, array(
		'name'       => '',
        'desc'       => __( ' 
        <div class="gboxhelp-text"> 
        <div class="gboxleft-img"> 
            <img src="'.plugin_dir_url( dirname( __FILE__ ) ) . 'images/nalam.png'.'" alt="" />
        </div>
            <div class="gboxright-text">
            <strong>Donate me </strong><br />
            <span>Paypal does not support my country</span>
           <p>If you like my plugin.Please donate me my fiverr account by create order as amount as your donation.</p> 
            <a class="donat_button" href="https://www.fiverr.com/nnalam/do-anything-with-wordpress" target="_blank">Donate me</a> 
            </div>
        </div>'/*
        <div class="gboxhelp-text"> 
            <div class="gboxleft-img"> 
                <img src="'.plugin_dir_url( dirname( __FILE__ ) ) . 'images/nnalam.png'.'" alt="" />
            </div>
            <div class="gboxright-text">
            <strong>Need help? </strong><br />
            <span>Start only $5 !!</span>
           <p>You may create order in fiverr for any WordPress related job and <b>Gallery Box</b> set-up.</p>
            <a class="donat_button" href="https://www.fiverr.com/nnalam/do-anything-with-wordpress" target="_blank">Create order</a>           
            </div>
        </div>*/

        , 'gbox' ),
        'id'         => 'donar_helper',
        'type'       => 'text',
        
	) );
    
    $gallery_box_meta->add_group_field( $help_groupe, array(
		'desc' => '<a class="five-star" href="http://wpthemespace.com/product/x-blog/" target="_blank"><img src="https://wpthemespace.com/wp-content/uploads/2019/01/xblog-pro.png" alt="Xblog pro" /></a>',
		'id'   => 'awesome_boot',
		'type' => 'text',
	) );    
   
    
    
	
}
add_action( 'cmb2_admin_init', 'gbox_meta_group');
endif;



