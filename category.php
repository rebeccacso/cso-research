<?php get_header(); ?>

<!--CONTENT-->
<div id="content">


<?php $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

<div id="title-bar" style="background-image:url('<?php echo $image; ?>')">

<div class="img-gradient"></div>

<h1>News & Events</h1>
<h2>&gt; CSO eNews</h2>

</div>
<div class="breadcrumbs">
<p><a href="<?php home_url(); ?>">Home</a> / <a href="<?php site_url(); ?>/news">News &amp; Events</a> / <a href="<?php site_url(); ?>/news/enews">CSO eNews</a> / <?php single_cat_title(); ?></p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">
<?php

// Current Category Information
$cat = get_category( get_query_var( 'cat' ) );
$cat_id = $cat->cat_ID;
$cat_name = $cat->name;

// Current eNews Edition UNIX

$enews_edition = get_option( 'taxonomy_' . $cat_id . '' );
$enews_edition_unix = $enews_edition['enews_edition']; 

// Previous Edition UNIX

$previous_enews_edition_unix = strtotime("-1 month", $enews_edition_unix);


// Previous Edition Category

$previous_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous_enews_edition_unix%'");


// Check if this edition exists

if (empty($previous_edition_cat)) {
    $previous_enews_edition_unix2 = strtotime("-2 month", $enews_edition_unix);
	
	// Previous Edition Category - 2 months

	$previous_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous_enews_edition_unix2%' ");
	$previous_edition_cat_id = str_replace("taxonomy_", "", $previous_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous_edition_cat = get_category($previous_edition_cat_id);
	$previous_edition_cat_slug = $previous_edition_cat->slug;
	$previous_edition_cat_name = $previous_edition_cat->name;
} else {

	$previous_edition_cat_id = str_replace("taxonomy_", "", $previous_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous_edition_cat = get_category($previous_edition_cat_id);
	$previous_edition_cat_slug = $previous_edition_cat->slug;
	$previous_edition_cat_name = $previous_edition_cat->name;
}

// Next Edition UNIX

$next_enews_edition_unix = strtotime("+1 month", $enews_edition_unix);

// Next Edition Category

$next_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$next_enews_edition_unix%' ");

// Check if this edition exists

if (empty($next_edition_cat)) {
    $next_enews_edition_unix2 = strtotime("+2 month", $enews_edition_unix);
	
	//Next Edition Category - 2 months
	
	$next_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$next_enews_edition_unix2%' ");
	$next_edition_cat_id = str_replace("taxonomy_", "", $next_edition_cat); //THIS is the ID of the previous category, based on the unix
	$next_edition_cat = get_category($next_edition_cat_id);
	$next_edition_cat_slug = $next_edition_cat->slug;
	$next_edition_cat_name = $next_edition_cat->name;
} else {
	
	$next_edition_cat_id = str_replace("taxonomy_", "", $next_edition_cat); //THIS is the ID of the previous category, based on the unix
	$next_edition_cat = get_category($next_edition_cat_id);
	$next_edition_cat_slug = $next_edition_cat->slug;
	$next_edition_cat_name = $next_edition_cat->name;
}
	

?>

<h2><?php single_cat_title(); ?> eNews</h2>
<div class="content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
<h3 id="<?php echo $post->post_name; ?>"><?php the_title(); ?></h3>
<?php if( get_the_tags() ) { ?>
	<div class="tags"><p><?php the_tags('<span>','</span><span>','</span>'); ?></p></div>   
    <?php } ?>    
<?php the_content(); ?>

 <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, there are currently no articles in this edition of the eNews.' ); ?></p>
    <?php endif; ?>
</div>
<div class="enews-nav">

<?php if (!empty($previous_edition_cat_slug)) { ?>
<a href="<?php echo home_url(); ?>/news/enews/<?php print $previous_edition_cat_slug; ?>"><button class="button-blue left">&lt; <?php print $previous_edition_cat_name; ?></button></a>
<?php } ?>

<?php if (!empty($next_edition_cat_slug)) { ?>
<a href="<?php echo home_url(); ?>/news/enews/<?php print $next_edition_cat_slug; ?>"><button class="button-blue right"><?php print $next_edition_cat_name; ?> &gt;</button></a>
<?php } ?>
</div>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">


<?php
  $news_children = wp_list_pages('title_li=&child_of=125&echo=0&depth=1'); //news children ?>
  <nav>
  	<ul>
    	<li><a href="<?php echo get_permalink( '125' ); ?>"><?php  echo get_the_title( '125' ); ?></a>
        	<ul>
				<?php echo $news_children; ?>
  			</ul>
        </li>
    </ul>
  </nav>        
    
    <nav>
    <ul>
    	<li><a href="#">eNews Archives</a>
        <ul>
<?php $args = array(
	'orderby'            => 'slug',
	'order'              => 'DESC',
	'use_desc_for_title' => 0,
	'exclude'            => '1,' . $cat_id . '',
	'title_li'           => '',
	'number'             => '10',
	'current_category'   => 0,
); 

wp_list_categories( $args ); ?>
		</ul>
   		</li>
    </ul>
</nav>

<?php get_sidebar( 'page-nav-2' ); ?>
</div>

<?php if ( is_active_sidebar( 'page-content' ) ) : ?>
		<div class="widgets"><?php dynamic_sidebar( 'page-content' ); ?></div>
<?php endif; ?>


</aside>

</div><!--/#content-->

<?php get_footer(); ?>