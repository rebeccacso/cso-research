<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
        <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>">
        <title><?php wp_title( '/' ); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
		<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
       
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300|Roboto:300' rel='stylesheet' type='text/css'>
        
        <?php wp_head(); ?>
    </head>
    
     <body <?php body_class( $class); ?>>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<!-- HEADER -->

<div id="header">

        
        <div class="logo"><a href="<?php echo home_url(); ?>"><?php get_template_part('img/inline', 'logo.svg'); ?></a></div>


<?php
	$cso_header_nav = array(
		'theme_location' => 'header-nav',
		'container' => 'nav',
		'depth' => 2
	);
?>

<?php wp_nav_menu( $cso_header_nav ); ?>




<div class="contact">
<p><a href="mailto:info@csoresearch.com">info@csoresearch.com</a> / <a href="tel:+18667054201">(866) 705-4201</a></p>

<a href="http://www.facebook.com/csoresearch"><?php get_template_part('img/social/inline', 'facebook.svg'); ?></a>
<a href="https://www.linkedin.com/groups?gid=2939520"><?php get_template_part('img/social/inline', 'linkedin.svg'); ?></a>
<a href="http://www.twitter.com/csoresearch"><?php get_template_part('img/social/inline', 'twitter.svg'); ?></a>
<a href="http://www.pinterest.com/csoresearch/following"><?php get_template_part('img/social/inline', 'pinterest.svg'); ?></a>
<a href="http://www.instagram.com/csoresearch"><?php get_template_part('img/social/inline', 'instagram.svg'); ?></a>
<a href="http://www.youtube.com/csoresearch"><?php get_template_part('img/social/inline', 'youtube.svg'); ?></a>
</div>

<div class="search">

<form id="searchform" class="searchform" action="http://campuscareercoach.com/" method="get" role="search">

    <div>
        <label class="screen-reader-text" for="s"></label>
        <input id="s" type="text" name="s" value=""></input>
        <input id="searchsubmit" type="submit" value="Search"></input>
    </div>

</form>

</div>
<div class="nav-icon">
<?php get_template_part('img/icons/inline', 'menu.svg'); ?>
</div>
<div class="search-icon">
<?php get_template_part('img/icons/inline', 'search.svg'); ?>
</div>

</div><!--/#header-->