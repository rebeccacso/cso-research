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
$cat = get_category( get_query_var( 'cat' ) );
$cat_id = $cat->cat_ID;
$cat_name = $cat->name;
$cat_slug = $cat->slug;

$previous_enews_slug = $cat_slug-1;
$previous_enews_term = get_term_by('slug', $previous_enews_slug, 'category');
$previous_enews_name = $previous_enews_term->name;

$next_enews_slug = $cat_slug+1;
$next_enews_term = get_term_by('slug', $next_enews_slug, 'category');
$next_enews_name = $next_enews_term->name;
	
?>

<?php 

$enews_edition = get_option( 'taxonomy_' . $cat_id . '' );
$enews_edition_unix = $enews_edition['enews_edition']; 

$enews_edition_previous = strtotime("-1 month", $enews_edition_unix);
$enews_edition_next = strtotime("+1 month", $enews_edition_unix);


?>


<?php
$category = $wpdb->get_row("SELECT * FROM $wpdb->options");
 
print_r($category);
?>

<h1>Current Edition: <?php echo date("F Y", $enews_edition_unix); ?> <?php print $enews_edition_unix; ?></h1>

<h2>This Month's Edition - Category ID (should be 10):<?php echo $enews_edition_category2->name; ?>
</h2>

<h1>Last Month's Edition: <?php echo date("F Y", $enews_edition_previous); ?></h1>

<h1>Next Month's Edition: <?php echo date("F Y", $enews_edition_next); ?></h1>

<h2><?php single_cat_title(); ?> eNews</h2>
<div class="content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     
<h3><?php the_title(); ?></h3>
<?php if( get_the_tags() ) { ?>
	<div class="tags"><p><?php the_tags('<span>','</span><span>','</span>'); ?></p></div>   
    <?php } ?>    
<?php the_content(); ?>

 <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, there are currently no articles in this edition of the eNews.' ); ?></p>
    <?php endif; ?>
</div>

<h2><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous_enews_slug; ?>">< <?php print $previous_enews_name; ?></a></h2>
<h2><a href="<?php echo home_url(); ?>/news/enews/<?php print $next_enews_slug; ?>"><?php print $next_enews_name; ?> ></a></h2>
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
	'number'             => '5',
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