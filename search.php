<?php get_header(); ?>

<!--CONTENT-->
<div id="content">


<div id="title-bar" style="background-image:url('http://csoresearch.thecampuscareercoach.com/wp-content/uploads/sites/4/2014/11/non-model2_20_2245_.jpg')">

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

//get ids of all subpages of Services Main (id=304)
$services_children = get_pages('child_of=304');
$services_children_ids = wp_list_pluck( $services_children, 'ID' );

$unwanted_children_ids = array_merge($cs_children_ids, $services_children_ids );

// http://devotepress.com/wordpress-coding/wordpress-custom-loop-pagination-2

// Global Variables
global $wp_query, $paged;


// Paged Parameter
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$search_query = new WP_Query( array(
	's' => get_search_query(),
	'post__not_in' => $unwanted_children_ids,
	'post_type' => array('page', 'post', 'tshowcase'),
	'paged'		=> $paged
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



     <?php endwhile; ?>
     
            <?php cso_paginate(); ?>
            
     
     
     <?php else: ?>
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