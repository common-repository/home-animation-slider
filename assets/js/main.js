(function ($) {
	"use strict";
    
    //document ready function
    jQuery(document).ready(function($){
/*-----
Bootstrap carousel active
----------------------*/ 
        var mobileSlider = $('.carousel');
        mobileSlider.carousel({
          interval: 8000,
        });

        $('.awesome-carousel .carousel-inner .item:first-child').addClass('active');
        


    });//End document ready function
   


}(jQuery));	


