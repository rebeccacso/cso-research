<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="title-bar" style="background-image:url('[insert url here]')">

<div class="img-gradient"></div>

<h1>Team</h1>
<h2> &gt; <?php the_title(); ?></h2>




</div>
<div class="breadcrumbs">
<p><a href="<?php home_url(); ?>">Home</a> / <a href="<?php site_url(); ?>/company">Company</a> / <a href="<?php site_url(); ?>/company/team">Team</a> / <?php the_title(); ?></p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">
<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">


<?php get_sidebar( 'tshowcase-nav' ); ?>


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