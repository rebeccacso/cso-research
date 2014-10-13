<?php
/*
Template Name: Services Main Template
*/
?>

<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="title-bar" style="background-image:url('<?php echo $image; ?>')">

<div class="img-gradient"></div>

<?php if ( is_page() && $post->post_parent > 0 ) { 
    echo "<h1>" . get_the_title($post->post_parent) . "</h1>
<h2> &gt; " . get_the_title() . "</h2>";
} else {
	echo "<h1>" . get_the_title() . "</h1>";
}; ?>



</div>
<div class="breadcrumbs">

</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">
<?php the_content(); ?>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">

<?php get_sidebar( 'page-nav-2' ); ?>
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