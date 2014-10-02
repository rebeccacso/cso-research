	
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
