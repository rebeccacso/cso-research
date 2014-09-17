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
  jQuery(".toggle-support").click(function(){
    jQuery(".toggle-support .sub-menu").toggle("fast","linear");
  });
});

jQuery('.toggle-support').click(function() {
    jQuery(this).toggleClass('active');
});

jQuery(document).ready(function(){
  jQuery(".toggle-university").click(function(){
    jQuery(".toggle-university .sub-menu").toggle("fast","linear");
  });
});

jQuery('.toggle-university').click(function() {
    jQuery(this).toggleClass('active');
});

jQuery(document).ready(function(){
  jQuery(".toggle-community").click(function(){
    jQuery(".toggle-community .sub-menu").toggle("fast","linear");
  });
});

jQuery('.toggle-community').click(function() {
    jQuery(this).toggleClass('active');
});

jQuery(document).ready(function(){
  jQuery(".toggle-products").click(function(){
    jQuery(".toggle-products .sub-menu").toggle("fast","linear");
  });
});

jQuery('.toggle-products').click(function() {
    jQuery(this).toggleClass('active');
});


var jQuerybody = jQuery('body');

if (jQuerybody.hasClass('page-id-91') || jQuerybody.hasClass('parent-pageid-91') || jQuerybody.hasClass('page-id-90')) {
	jQuery('.toggle-support').addClass('active');
}

if (jQuerybody.hasClass('page-id-93') || jQuerybody.hasClass('parent-pageid-93')) {
	jQuery('.toggle-university').addClass('active');
}

if (jQuerybody.hasClass('page-id-105') || jQuerybody.hasClass('parent-pageid-105')) {
	jQuery('.toggle-community').addClass('active');
}

if (jQuerybody.hasClass('page-id-107') || jQuerybody.hasClass('parent-pageid-107')) {
	jQuery('.toggle-products').addClass('active');
}


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
	   jQuery('.bg-image.system, .bg-image.outcomes, .bg-image.connect, .bg-image.coach').removeClass('active');
   }

   if (window_top > system_top){
	   jQuery('.bg-image.system').addClass('active');
	   jQuery('.bg-image.general, .bg-image.outcomes, .bg-image.connect, .bg-image.coach').removeClass('active');
   }
   
   if (window_top > outcomes_top){
	   jQuery('.bg-image.outcomes').addClass('active');
   	   jQuery('.bg-image.general, .bg-image.system, .bg-image.connect, .bg-image.coach').removeClass('active');

   }
   
   if (window_top > connect_top){
	   jQuery('.bg-image.connect').addClass('active');
   	   jQuery('.bg-image.general, .bg-image.system, .bg-image.outcomes, .bg-image.coach').removeClass('active');
   }
      if (window_top > coach_top){
	   jQuery('.bg-image.coach').addClass('active'); 
	   jQuery('.bg-image.general, .bg-image.system, .bg-image.outcomes, .bg-image.connect').removeClass('active');  
   }
}
jQuery(function() {
  jQuery(window).scroll(scroll_style);
  scroll_style();
 });
 
 
