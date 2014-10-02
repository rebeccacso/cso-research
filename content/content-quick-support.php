<script>
// client-serivces quick support bar

jQuery(document).ready(function() {  
    var stickyNavTop = jQuery('#quick-support').offset().top;  
      
    var stickyNav = function(){  
    var scrollTop = jQuery(window).scrollTop();  
           
    if (scrollTop > stickyNavTop) {   
        jQuery('#quick-support').addClass('sticky');  
    } else {  
        jQuery('#quick-support').removeClass('sticky');   
    }  
    };  
      
    stickyNav();  
      
    jQuery(window).scroll(function() {  
        stickyNav();  
    });  
});
</script>

<div id="quick-support">
<ul>
<li><a href="#"><?php get_template_part('img/icons/support/inline', 'chat.svg'); ?>Chat</a></li>
<li><a href="#"><?php get_template_part('img/icons/support/inline', 'faq.svg'); ?>FAQ</a></li>
<li><a href="#"><?php get_template_part('img/icons/support/inline', 'ticket.svg'); ?>Ticket</a></li>
<li><a href="#"><?php get_template_part('img/icons/support/inline', 'email.svg'); ?>Email</a></li>
<li><a href="#"><?php get_template_part('img/icons/support/inline', 'call.svg'); ?>Call</a></li>
</ul>
</div>