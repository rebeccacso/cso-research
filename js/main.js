jQuery(document).ready(function(){
  jQuery(".search-icon").click(function(){
    jQuery(".search").toggle("fast","linear");
  });
});

//http://stackoverflow.com/questions/13901071/toggle-the-css-property-of-a-div-using-jquery-javascript

jQuery('.search-icon').click(function() {
    jQuery(this).toggleClass('active');
});

jQuery(document).ready(function(){
  jQuery(".nav-icon").click(function(){
    jQuery("#header nav").toggle("fast","linear");
  });
});

//http://stackoverflow.com/questions/13901071/toggle-the-css-property-of-a-div-using-jquery-javascript

jQuery('.nav-icon').click(function() {
    jQuery("#header nav").toggleClass('mobile');
});

//http://stackoverflow.com/questions/13901071/toggle-the-css-property-of-a-div-using-jquery-javascript

jQuery('.nav-icon').click(function() {
    jQuery(this).toggleClass('active');
});

// Smooth scrolling for jump to nav

jQuery(function() {
	jQuery('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		|| location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html,body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});


// Toggle for client services navigation

jQuery(document).ready(function(){
  jQuery(".toggle-main-support").click(function(){
    jQuery(".toggle-sub-support").toggle("fast","linear");
  });
});

jQuery('.toggle-main-support').click(function() {
    jQuery(this).toggleClass('active');
});

jQuery(document).ready(function(){
  jQuery(".toggle-main-university").click(function(){
    jQuery(".toggle-sub-university").toggle("fast","linear");
  });
});

jQuery('.toggle-main-university').click(function() {
    jQuery(this).toggleClass('active');
});


// div height for home page - viewport
// http://css-tricks.com/forums/topic/setting-a-div-height-to-the-window-viewport-size/


jQuery(document).ready(function(){
resizeDiv();
});

window.onresize = function(event) {
resizeDiv();
}

function resizeDiv() {
vpw = jQuery(window).width();
vph = jQuery(window).height();
jQuery('.bg-image').css({'height': vph});
}


	
//home reveal text http://stackoverflow.com/questions/10555998/change-css-element-with-jquery-when-scroll-reaches-an-anchor-point

function scroll_style() {
   var window_top = jQuery(window).scrollTop();
   var header_top = jQuery('#header').offset().top;
   var system_top = jQuery('#system').offset().top;
   var outcomes_top = jQuery('#outcomes').offset().top;
   var connect_top = jQuery('#connect').offset().top;
   var coach_top = jQuery('#coach').offset().top;

   if (window_top > header_top){
	   jQuery('.bg-image.general').addClass('active');
	   jQuery('.bg-image.system').removeClass('active');
	   jQuery('.bg-image.outcomes').removeClass('active');
	   jQuery('.bg-image.connect').removeClass('active');
	   jQuery('.bg-image.coach').removeClass('active');
   }

   if (window_top > system_top){
	   jQuery('.bg-image.general').removeClass('active');
	   jQuery('.bg-image.system').addClass('active');
	   jQuery('.bg-image.outcomes').removeClass('active');
	   jQuery('.bg-image.connect').removeClass('active');
	   jQuery('.bg-image.coach').removeClass('active');
   }
   
   if (window_top > outcomes_top){
	   jQuery('.bg-image.general').removeClass('active');
	   jQuery('.bg-image.system').removeClass('active');
	   jQuery('.bg-image.outcomes').addClass('active');
	   jQuery('.bg-image.connect').removeClass('active');	
	   jQuery('.bg-image.coach').removeClass('active');   
   }
   
   if (window_top > connect_top){
	   jQuery('.bg-image.general').removeClass('active');
	   jQuery('.bg-image.system').removeClass('active');
	   jQuery('.bg-image.outcomes').removeClass('active');
	   jQuery('.bg-image.connect').addClass('active');	
	   jQuery('.bg-image.coach').removeClass('active');   
   }
      if (window_top > coach_top){
	   jQuery('.bg-image.general').removeClass('active');
	   jQuery('.bg-image.system').removeClass('active');
	   jQuery('.bg-image.outcomes').removeClass('active');
	   jQuery('.bg-image.connect').removeClass('active');	
	   jQuery('.bg-image.coach').addClass('active');   
   }
}
jQuery(function() {
  jQuery(window).scroll(scroll_style);
  scroll_style();
 });
 
 
