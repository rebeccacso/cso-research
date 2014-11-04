<?php
/*
Template Name: eNews Page Template
*/
?>

<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div id="title-bar" style="background-image:url('http://csoresearch.thecampuscareercoach.com/wp-content/uploads/sites/4/2014/11/BDSC05357.jpg')">

<div class="img-gradient"></div>

<?php if ( is_page() && $post->post_parent > 0 ) { 
    echo "<h1>" . get_the_title($post->post_parent) . "</h1>
<h2> &gt; " . get_the_title() . "</h2>";
} else {
	echo "<h1>" . get_the_title() . "</h1>";
}; ?>




</div>
<div class="breadcrumbs">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p>','</p>');
} ?>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">

<?php the_content(); ?>

<?php 
// Get Option_Value column
$enews_unixes = $wpdb->get_col("SELECT option_value FROM wp_4_options WHERE option_name LIKE 'taxonomy_%'");

// Create an array of unserialized eNews Edition values
$unixes = array();
foreach ($enews_unixes as $unix) 
 { 
 $data = unserialize($unix);
 $unixes[] = $data['enews_edition']; 
 };
 
// Sory the array

arsort($unixes);

// Grab the first value of the array

$recent_enews_unix = reset($unixes);
 
// Most recent edition of the eNews

$recent_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$recent_enews_unix%' ");
$recent_edition_cat_id = str_replace("taxonomy_", "", $recent_edition_cat); //THIS is the ID of the previous category, based on the unix
$recent_edition_cat = get_category($recent_edition_cat_id);
$recent_edition_cat_slug = $recent_edition_cat->slug;
$recent_edition_cat_name = $recent_edition_cat->name;

// Previous Edition UNIX

$previous_enews_edition_unix = strtotime("-1 month", $recent_enews_unix);


// Previous Edition Category

$previous_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous_enews_edition_unix%'");


// Check if this edition exists

if (empty($previous_edition_cat)) {
    $previous_enews_edition_unix2 = strtotime("-2 month", $recent_enews_unix);
	
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
?>

<h2><?php echo $recent_edition_cat_name; ?></h2>

<?php

$enews_query = new WP_query( 'category_name='.$recent_edition_cat_slug );

if ( $enews_query->have_posts() ) : while ( $enews_query->have_posts() ) : $enews_query->the_post(); ?>      
<h3><?php the_title(); ?></h3>       
<?php the_content(); ?>

 <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; 
	
	wp_reset_postdata(); ?>

<div class="enews-nav">
<a href="<?php echo home_url(); ?>/news/enews/<?php print $previous_edition_cat_slug; ?>"><button class="button-blue left">&lt; <?php print $previous_edition_cat_name; ?></button></a>
</div>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus">


<?php
  $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1'); //children of current page
  $parent = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&depth=1'); //children of parent page = siblings
  
  if ($children) { //if the page has children ?> 
  
  <nav>
  	<ul>
    	<li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
        	<ul>
				<?php echo $children; ?>
  			</ul>
        </li>
    </ul>
  </nav>
  
  <?php } else {  // if the page does not have children ?>
	<nav>
    	<ul>
        	<li><a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>
            	<ul>
					<?php echo $parent; ?>
    			</ul>            
            </li>
        </ul>
    </nav>
    <?php } ?>


<?php
// For Left Nav

	//Previous Month - 3

	$previous3_enews_edition_unix = strtotime("-3 month", $recent_enews_unix);
	$previous3_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous3_enews_edition_unix%' ");
	$previous3_edition_cat_id = str_replace("taxonomy_", "", $previous3_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous3_edition_cat = get_category($previous3_edition_cat_id);
	$previous3_edition_cat_slug = $previous3_edition_cat->slug;
	$previous3_edition_cat_name = $previous3_edition_cat->name;

	//Previous Month - 2

	$previous2_enews_edition_unix = strtotime("-2 month", $recent_enews_unix);
	$previous2_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous2_enews_edition_unix%' ");
	$previous2_edition_cat_id = str_replace("taxonomy_", "", $previous2_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous2_edition_cat = get_category($previous2_edition_cat_id);
	$previous2_edition_cat_slug = $previous2_edition_cat->slug;
	$previous2_edition_cat_name = $previous2_edition_cat->name;
	
	//Previous Month - 1

	$previous1_enews_edition_unix = strtotime("-1 month", $recent_enews_unix);
	$previous1_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous1_enews_edition_unix%' ");
	$previous1_edition_cat_id = str_replace("taxonomy_", "", $previous1_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous1_edition_cat = get_category($previous1_edition_cat_id);
	$previous1_edition_cat_slug = $previous1_edition_cat->slug;
	$previous1_edition_cat_name = $previous1_edition_cat->name;
	
	?>    
    
    

    <nav>
    <ul>
    	<li><a href="#">eNews Archives</a>
        <ul>
        <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous3_edition_cat_slug; ?>"><?php print $previous3_edition_cat_name; ?></a></li>
        <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous2_edition_cat_slug; ?>"><?php print $previous2_edition_cat_name; ?></a></li>
        	<li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous1_edition_cat_slug; ?>"><?php print $previous1_edition_cat_name; ?></a></li>
            <li>&gt; <?php echo $recent_edition_cat_name; ?></li>
        </ul></li></ul></nav>




<?php get_sidebar( 'page-nav-2' ); ?>
</div>

<?php if ( is_active_sidebar( 'enews-widgets' ) ) : ?>
		<div class="widgets"><?php dynamic_sidebar( 'enews-widgets' ); ?></div>
<?php endif; ?>


</aside>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; ?>

</div><!--/#content-->

<?php get_footer(); ?>