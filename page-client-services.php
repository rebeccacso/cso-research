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

<div id="title-bar" style="background-image:url('<?php echo $image; ?>')">

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

<?php get_template_part('content', 'quick-support'); ?>


<div class="main">
<?php $slug = get_the_slug(); ?>

<div id="title">
<?php get_template_part('img/icons/support/inline', $slug . '.svg' ); ?>
<h2><?php the_title(); ?></h2>
</div>

<div class="info">
<?php dynamic_sidebar( 'client-svcs-info' ); ?>
</div>

<?php the_content(); ?>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">

<?php
	$cso_client_svcs = array(
		'theme_location' => 'client-svcs',
		'container' => 'nav',
		'depth' => 2
	);
?>

<?php wp_nav_menu( $cso_client_svcs ); ?>

</div>

<?php if ( is_active_sidebar( 'page-content' ) ) : ?>
		<div class="widgets"><?php dynamic_sidebar( 'page-content' ); ?></div>
<?php endif; ?>


</aside>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; ?>

</div><!--/#content-->

<?php get_footer(); ?>