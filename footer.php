<!--FOOTER-->

<div id="footer">
<div class="mid-bar">

<?php
	$cso_footer_nav = array(
		'theme_location' => 'footer-nav',
		'container' => 'nav',
		'depth' => 2
	);
?>

<?php wp_nav_menu( $cso_footer_nav ); ?>

</div>
<div class="bot-bar">

<div class="right">
<p>
<a href="http://www.facebook.com/csoresearch"><?php get_template_part('img/social/inline', 'facebook.svg'); ?></a>
<a href="https://www.linkedin.com/groups?gid=2939520"><?php get_template_part('img/social/inline', 'linkedin.svg'); ?></a>
<a href="http://www.twitter.com/csoresearch"><?php get_template_part('img/social/inline', 'twitter.svg'); ?></a>
<a href="http://www.pinterest.com/csoresearch/following"><?php get_template_part('img/social/inline', 'pinterest.svg'); ?></a>
<a href="http://www.instagram.com/csoresearch"><?php get_template_part('img/social/inline', 'instagram.svg'); ?></a>
<a href="http://www.youtube.com/csoresearch"><?php get_template_part('img/social/inline', 'youtube.svg'); ?></a>
</p>

</div>

<div class="left">
<p><a href="<?php echo home_url(); ?>/contact/demo">Request a Demo</a><br>
<a href="mailto:info@csoresearch.com">info@csoresearch.com</a><br>
<a href="tel:+18667054201">(866) 705-4201</a></p>
<p class="small">Copyright &copy; 2014 CSO Research, Inc. All rights reserved.</p>
</div>

</div>



</div><!--/#footer-->

        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
         <script src="<?php echo get_template_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js" type="text/javascript"></script>
        <?php if ( is_home() ) { ?>
        	<script src="<?php echo get_template_directory_uri(); ?>/js/home.js" type="text/javascript"></script>
            <?php } ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
        
        <?php wp_footer(); ?>
    </body>
</html>
