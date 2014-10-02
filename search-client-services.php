<?php get_header(); ?>

<!--CONTENT-->
<div class="page-template-page-client-services-php">
<div id="content">


<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="title-bar" style="background-image:url('<?php echo $image; ?>')">

<div class="img-gradient"></div>
<h1>Client Services</h1>
<h2>> Search</h2>

</div>

<div class="breadcrumbs">
<p><a href="<?php home_url(); ?>">Home</a> / <a href="<?php site_url(); ?>/client-services">Client Services</a> / Search results for "<?php echo get_search_query(); ?>"</p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>

<?php get_template_part('content', 'quick-support'); ?>



<div class="main">

<h2><?php _e( 'Search results for: "' . get_search_query() .'"' ); ?></h2>


<form id="searchform" class="searchform" action="<?php bloginfo('url'); ?>" method="get" role="search">

    <div>
        <label class="screen-reader-text" for="s"><p>Search again:</p></label>
        <input id="s" type="text" name="s" value="<?php echo get_search_query() ;?>"></input>
        <input id="searchsubmit" type="submit" value="Search"></input>
        <input type="hidden" name="search" value="client-services" />
    </div>

</form>
<hr class="lt-blue"/>
<div class="content">

<?php
//get ids of all subpages of Client Services (id=90)
$cs_children = get_pages('child_of=90');
$cs_children_ids = wp_list_pluck( $cs_children, 'ID' );

$cs_search_query = new WP_Query( array(
	's' => get_search_query(),
	'post_type' => 'page',
	'post__in' => $cs_children_ids
	 )
	 );

if ( $cs_search_query->have_posts() ) : while ( $cs_search_query->have_posts() ) : $cs_search_query->the_post(); ?>
<?php $slug = get_the_slug(); ?>
 <div  <?php post_class( 'parent-pageid-' . $post->post_parent . '' ); ?>><h3><?php get_template_part('img/icons/support/inline', $slug . '.svg' ); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 <?php the_excerpt(); ?>
 
 </div>
     <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, your search for "' . get_search_query() .'" returned no results.' ); ?></p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>
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


</aside>


</div>
</div><!--/#content-->

<?php get_footer(); ?>