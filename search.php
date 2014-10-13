<?php get_header(); ?>

<!--CONTENT-->
<div id="content">


<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="title-bar" style="background-image:url('<?php echo $image; ?>')">

<div class="img-gradient"></div>

<h1>Search</h1>



</div>
<div class="breadcrumbs">
<p><a href="<?php home_url(); ?>">Home</a> / Search results for "<?php echo get_search_query(); ?>"</p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">

<h2><?php _e( 'Search results for: "' . get_search_query() .'"' ); ?></h2>


<form id="searchform" class="searchform" action="<?php bloginfo('url'); ?>" method="get" role="search">

    <div>
        <label class="screen-reader-text" for="s"><p>Search again:</p></label>
        <input id="s" type="text" name="s" value="<?php echo get_search_query() ;?>"></input>
        <input id="searchsubmit" type="submit" value="Search"></input>
    </div>

</form>
<hr class="lt-blue"/>


<?php
//get ids of all subpages of Client Services (id=90)
$cs_children = get_pages('child_of=90');
$cs_children_ids = wp_list_pluck( $cs_children, 'ID' );

$search_query = new WP_Query( array(
	's' => get_search_query(),
	'post__not_in' => $cs_children_ids
	 )
	 );

if ( $search_query->have_posts() ) : while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
<div>

<?php if($post->post_type == 'post') {?>
<?php
//grab the category for later use
$category = get_the_category();
?>
<h3><a href="<?php home_url(); ?>/news/enews/<?php echo $category[0]->slug; ?>#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<?php } else { ?>

<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 <?php the_excerpt(); ?>
 
 <?php } ?>
  </div>


     <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, your search for "' . get_search_query() .'" returned no results.' ); ?></p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
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


</div><!--/#content-->

<?php get_footer(); ?>