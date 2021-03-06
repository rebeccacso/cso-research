<?php
/*
Template Name: Client Services Template
*/
?>


<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="title-bar" style="background-image:url('http://csoresearch.thecampuscareercoach.com/wp-content/uploads/sites/4/2014/10/service-copy.jpg')">

<div class="img-gradient"></div>

<h1>Client Services</h1>

</div>
<div class="breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p>','</p>');
} ?>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>

<?php get_template_part('content/content', 'quick-support'); ?>


<div class="main">
<?php $slug = get_the_slug(); ?>

<div id="title">
<?php get_template_part('img/icons/support/inline', $slug . '.svg' ); ?>
<span><h2><?php the_title(); ?></h2></span>
</div>

<?php if ( is_active_sidebar( 'client-svcs-info' ) ) : ?>
		<div class="info"><?php dynamic_sidebar( 'client-svcs-info' ); ?></div>
<?php endif; ?>

<div class="content">

<?php the_content(); ?>

</div>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">

<form id="searchform" class="searchform" action="<?php bloginfo('url'); ?>" method="get" role="search">

    <div>
        <label class="screen-reader-text" for="s"></label>
        <input id="s" type="text" name="s" value=""></input>
        <input id="searchsubmit" type="submit" value="Search"></input>
        <input type="hidden" name="search" value="client-services" />
    </div>

</form>

<?php
	$cso_client_svcs = array(
		'theme_location' => 'client-svcs',
		'container' => 'nav',
		'depth' => 2
	);
?>

<?php wp_nav_menu( $cso_client_svcs ); ?>

</div>


</aside>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; ?>

</div><!--/#content-->

<?php get_footer(); ?>