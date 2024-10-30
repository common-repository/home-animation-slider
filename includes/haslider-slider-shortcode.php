<?php 
/*
 * @link              https://wpthemespace.com
 * @since             1.0.0
 * @package           haslider slider wordpress plugin    
 * description        All slider output by this shortcode
 *
 * @ haslider slider
 */
 

 /*
 * Style one slider get this function
 */
 function home_anislider_style_one($id) {
    // Get the list of files
	$slider_animation_one = get_post_meta( $id, 'slider_animation_one', 1 );
	


    // Loop through them and output an image
   foreach ((array) $slider_animation_one as  $key =>$styleone ) {
   		$count = 0;
   		$slider_title =  !empty( $styleone['slider_title'])  ? $styleone['slider_title'] : '';
   		$bg_img =  !empty( $styleone['bg_img_id'])  ? $styleone['bg_img_id'] : '';
   		$simg_one =  !empty( $styleone['simg_one_id'])  ? $styleone['simg_one_id'] : '';
   		$simg_two =  !empty( $styleone['simg_two_id'])  ? $styleone['simg_two_id'] : '';
   		$slider_desc =  !empty( $styleone['slider_desc'])  ? $styleone['slider_desc'] : '';
   		$slider_btn =  !empty( $styleone['slider_btn'])  ? $styleone['slider_btn'] : __('Read More','haslider');
   		$slider_btn_url =  !empty( $styleone['slider_btn_url'])  ? $styleone['slider_btn_url'] : '#';
   		if($bg_img){
		$bg_img = wp_get_attachment_image_src( $bg_img ,'slider-bg');
		$bg_img_url = $bg_img[0];
   		}else{
   			$bg_img_url = HOME_ANISLIDER_URL.'/assets/img/bg1.jpg';
   		}

		$simg_one = wp_get_attachment_image_src( $simg_one ,'slider-img1');
		$simg_two = wp_get_attachment_image_src( $simg_two ,'slider-img2');

	$output ='<div class="item">
            <img class="bg-img" src="'.esc_url($bg_img_url).'" alt="slider background">
             <div class="overlay"></div>
                <div class="carousel-caption">
                    <div class="mob1 posi-abs">';
             if($simg_one[0]){
            $output .='<img src="'.esc_url($simg_one[0]).'" alt="Slider image" />';
            }
           $output .='</div>
                    <div class="cap-text">'; 
           if($slider_title){
        $output .='<h1 class="brand">'.esc_html($slider_title).'</h1>';
        }
if($slider_desc){
	foreach ((array) $slider_desc as  $key =>$desc ) {
		$count++;
	        $output .='<h4 class="mf'.esc_html($count).'">'.esc_html($desc).'</h4>';
	} 
}              
        $output .='<a href="'.esc_url($slider_btn_url).'"  target="_blank" class="btn btn-warning btn-lg mf7">'.esc_html($slider_btn).'</a>
                    </div>
                    <div class="mob2 posi-abs">';
             if($simg_two[0]){ 
                $output .='<img src="'.esc_url($simg_two[0]).'" alt="Slider image" />';
            	}
           $output .='
                    </div>
                </div>
            </div>';
    echo $output;

    }
}

 /*
 * Style one slider get this function
 */
 function home_anislider_style_two($id) {
    // Get the list of files
	$slider_animation_two = get_post_meta( $id, 'slider_animation_two', 1 );
	

    // Loop through them and output an image
   foreach ((array) $slider_animation_two as  $key =>$styletwo ) {
   		$count = 0;
   		$slider_title =  !empty( $styletwo['slider_title'])  ? $styletwo['slider_title'] : '';
   		$bg_img =  !empty( $styletwo['bg_img_id'])  ? $styletwo['bg_img_id'] : '';
   		$simg_one =  !empty( $styletwo['simg_one_id'])  ? $styletwo['simg_one_id'] : '';
   		$slider_desc =  !empty( $styletwo['slider_desc'])  ? $styletwo['slider_desc'] : '';
   		$slider_btn =  !empty( $styletwo['slider_btn'])  ? $styletwo['slider_btn'] : __('Read More','haslider');
   		$slider_btn_url =  !empty( $styletwo['slider_btn_url'])  ? $styletwo['slider_btn_url'] : '#';

		if($bg_img){
		$bg_img = wp_get_attachment_image_src( $bg_img ,'slider-bg');
		$bg_img_url = $bg_img[0];
   		}else{
   			$bg_img_url = HOME_ANISLIDER_URL.'/assets/img/bg2.jpg';
   		}
		$simg_one = wp_get_attachment_image_src( $simg_one ,'slider-img1');

	$output ='<div class="item">
            <img class="bg-img" src="'.esc_url($bg_img_url).'" alt="slider bg">
            <div class="overlay"></div>
            <div class="carousel-caption">
                <div class="cap-text left-text">';
            if($slider_title){
            $output .='<h1 class="brand">'.esc_html($slider_title).'</h1>';
            }
if($slider_desc){
	foreach ((array) $slider_desc as  $key =>$desc ) {
		$count++;
	        $output .='<h4 class="mf'.esc_html($count).'">'.esc_html($desc).'</h4>';
	} 
} 
                    
            $output .='<a href="'.esc_url($slider_btn_url).'" class="btn btn-warning btn-lg mf7">'.esc_html($slider_btn).'</a>';
        $output .='</div>
                <div class="mob2 posi-abs">';
            if($simg_one[0]){
            $output .='<img src="'.esc_url($simg_one[0]).'" alt="slider image" />';
            }
    $output .='</div>
            </div>
        </div>';
    echo $output;

    }
}
 /*
 * Style three slider get this function
 */
 function home_anislider_style_three($id) {
    // Get the list of files
	$slider_animation_three = get_post_meta( $id, 'slider_animation_three', 1 );


    // Loop through them and output an image
   foreach ((array) $slider_animation_three as  $key =>$stylethree ) {
	$count = 0;
   		$slider_title =  !empty( $stylethree['slider_title'])  ? $stylethree['slider_title'] : '';
   		$bg_img =  !empty( $stylethree['bg_img_id'])  ? $stylethree['bg_img_id'] : '';
   		$simg_one =  !empty( $stylethree['simg_one_id'])  ? $stylethree['simg_one_id'] : '';
   		$simg_two =  !empty( $stylethree['simg_two_id'])  ? $stylethree['simg_two_id'] : '';
   		$slider_desc =  !empty( $stylethree['slider_desc'])  ? $stylethree['slider_desc'] : '';
   		$slider_btn =  !empty( $stylethree['slider_btn'])  ? $stylethree['slider_btn'] : __('Read More','haslider');
   		$slider_btn_url =  !empty( $stylethree['slider_btn_url'])  ? $stylethree['slider_btn_url'] : '#';

		if($bg_img){
		$bg_img = wp_get_attachment_image_src( $bg_img ,'slider-bg');
			$bg_img_url = $bg_img[0];
   		}else{
   			$bg_img_url = HOME_ANISLIDER_URL.'/assets/img/bg3.jpg';
   		}
		$simg_one = wp_get_attachment_image_src( $simg_one ,'slider-img1');
		$simg_two = wp_get_attachment_image_src( $simg_two ,'slider-img2');

	$output = '<div class="item">
            <img class="bg-img" src="'.esc_url($bg_img_url).'" alt="slider one">
            <div class="overlay"></div>
            <div class="carousel-caption">
                <div class="cap-text right-text"> ';
                if($slider_title){
        $output .='<h1 class="brand">'.esc_html($slider_title).'</h1>';
   		 }
if($slider_desc){
	foreach ((array) $slider_desc as  $key =>$desc ) {
		$count++;
	        $output .='<h4 class="mf'.esc_html($count).'">'.esc_html($desc).'</h4>';
	} 
}
                    
        $output .='<a href="'.esc_url($slider_btn_url).'" class="btn btn-warning btn-lg mf7">'.esc_html($slider_btn).'</a>';
        $output .='</div>
            <div class="mob3 posi-abs">'; 
          if($simg_one[0]){
        $output .='<img src="'.esc_url($simg_one[0]).'" alt="slider image" />';
    	}
        $output .='</div>
            <div class="mob4 posi-abs">';
            if($simg_two[0]){
        $output .='<img src="'.esc_url($simg_two[0]).'" alt="slider image" />';
    		}
        $output .='</div>
         </div>
        </div>';

    echo $output;

    }
}



 
if ( ! function_exists( 'hasliderslider_slider_shortcode' ) ) : 
function hasliderslider_slider_shortcode($atts, $content = null){
global $post;
ob_start();
    $haslider_atts = shortcode_atts( array(
        'id'=> '',
    ), $atts );

	//Query args
	$args = array(
		'post_type'  		=>	'haslider-slider',
		'post_status'  		=>	'publish',
		'posts_per_page' 	=> 1,
		 'p'                => $haslider_atts['id']
		
	);
	//start WP_Query
	$loop= new WP_Query($args);
	$slider_rand_number = rand(235415, 5694658);
	 
?>

	<?php if ($loop -> have_posts() ) : ?>
	<?php while ( $loop->have_posts()) :  $loop->the_post();

	//slider style one meta 
	$slider_animation_one = get_post_meta( get_the_ID(), 'slider_animation_one', 1 );
	$slider_title_one =  !empty( $slider_animation_one[0]['slider_title'])  ? $slider_animation_one[0]['slider_title'] : '';
	//slider style two meta 
	$slider_animation_two = get_post_meta( get_the_ID(), 'slider_animation_two', 1 );
	$slider_title_two =  !empty( $slider_animation_two[0]['slider_title'])  ? $slider_animation_two[0]['slider_title'] : '';
	//slider style three meta 
	$slider_animation_three = get_post_meta( get_the_ID(), 'slider_animation_three', 1 );
	$slider_title_three =  !empty( $slider_animation_three[0]['slider_title'])  ? $slider_animation_three[0]['slider_title'] : '';


	 ?>
	    <section id="hmslider" class="home-animation-slider"> 
            <div class="awesome-carousel"> 
                <div id="awesome-carousel<?php echo $slider_rand_number; ?>" class="carousel slide carousel-fade" data-ride="carousel">
		

                	<!-- Indicators -->
                    <ol class="carousel-indicators hslider-ind">
                        <li data-target="#awesome-carousel<?php echo $slider_rand_number; ?>" data-slide-to="0" class="active"></li>
                        <li data-target="#awesome-carousel<?php echo $slider_rand_number; ?>" data-slide-to="1"></li>
                        <li data-target="#awesome-carousel<?php echo $slider_rand_number; ?>" data-slide-to="2"></li>
                    </ol>
                  
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                    <?php
                    if($slider_title_one){
                     home_anislider_style_one(get_the_ID());
                     }
                      ?>  
                    <?php
                    if($slider_title_two){
                     home_anislider_style_two(get_the_ID()); 
                	 }
                     ?>  
                    <?php
                    if($slider_title_three){
                     home_anislider_style_three(get_the_ID());
                	 }
                      ?>  

                        <!-- slider item -->
                        <!-- End slider item -->
                        
                    </div>

                  <!-- Controls -->
                    <a class="left carousel-control" href="#awesome-carousel<?php echo $slider_rand_number; ?>" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#awesome-carousel<?php echo $slider_rand_number; ?>" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
	
	
	<?php endwhile; ?> 
<?php wp_reset_postdata(); ?>
 <?php else: ?>
 <div class="haslider-error">
 <h2><?php esc_html_e('No slider found!','haslider'); ?></h2>
 </div>
 <?php endif; ?>

 <?php 
 $haslider_shortcode = ob_get_clean(); 
return $haslider_shortcode;
}
add_shortcode('hslider','hasliderslider_slider_shortcode');
endif;
