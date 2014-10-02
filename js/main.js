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


