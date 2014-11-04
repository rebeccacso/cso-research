<?php get_header(); ?>

<!--CONTENT-->
<div id="content">

<div id="title-bar" style="background-image:url('http://csoresearch.thecampuscareercoach.com/wp-content/uploads/sites/4/2014/11/BDSC05357.jpg')">

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


// Check if this edition exists, and if not...

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

// Check if this edition exists, and if not...

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

<?php if (!empty($next_edition_cat_slug)) { ?>
<a href="<?php echo home_url(); ?>/news/enews/<?php print $next_edition_cat_slug; ?>"><button class="button-blue right group"><?php print $next_edition_cat_name; ?> &gt;</button></a>
<?php } ?>

<?php if (!empty($previous_edition_cat_slug)) { ?>
<a href="<?php echo home_url(); ?>/news/enews/<?php print $previous_edition_cat_slug; ?>"><button class="button-blue left group">&lt; <?php print $previous_edition_cat_name; ?></button></a>
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
    
<?php
// For Left Nav

	//Previous Month - 3

	$previous3_enews_edition_unix = strtotime("-3 month", $enews_edition_unix);
	$previous3_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous3_enews_edition_unix%' ");
	$previous3_edition_cat_id = str_replace("taxonomy_", "", $previous3_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous3_edition_cat = get_category($previous3_edition_cat_id);
	$previous3_edition_cat_slug = $previous3_edition_cat->slug;
	$previous3_edition_cat_name = $previous3_edition_cat->name;

	//Previous Month - 2

	$previous2_enews_edition_unix = strtotime("-2 month", $enews_edition_unix);
	$previous2_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous2_enews_edition_unix%' ");
	$previous2_edition_cat_id = str_replace("taxonomy_", "", $previous2_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous2_edition_cat = get_category($previous2_edition_cat_id);
	$previous2_edition_cat_slug = $previous2_edition_cat->slug;
	$previous2_edition_cat_name = $previous2_edition_cat->name;
	
	//Previous Month - 1

	$previous1_enews_edition_unix = strtotime("-1 month", $enews_edition_unix);
	$previous1_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$previous1_enews_edition_unix%' ");
	$previous1_edition_cat_id = str_replace("taxonomy_", "", $previous1_edition_cat); //THIS is the ID of the previous category, based on the unix
	$previous1_edition_cat = get_category($previous1_edition_cat_id);
	$previous1_edition_cat_slug = $previous1_edition_cat->slug;
	$previous1_edition_cat_name = $previous1_edition_cat->name;
	
	
	//Next Month - 3

	$next3_enews_edition_unix = strtotime("+3 month", $enews_edition_unix);
	$next3_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$next3_enews_edition_unix%' ");
	$next3_edition_cat_id = str_replace("taxonomy_", "", $next3_edition_cat); //THIS is the ID of the previous category, based on the unix
	$next3_edition_cat = get_category($next3_edition_cat_id);
	$next3_edition_cat_slug = $next3_edition_cat->slug;
	$next3_edition_cat_name = $next3_edition_cat->name;

	//Next Month - 2

	$next2_enews_edition_unix = strtotime("+2 month", $enews_edition_unix);
	$next2_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$next2_enews_edition_unix%' ");
	$next2_edition_cat_id = str_replace("taxonomy_", "", $next2_edition_cat); //THIS is the ID of the previous category, based on the unix
	$next2_edition_cat = get_category($next2_edition_cat_id);
	$next2_edition_cat_slug = $next2_edition_cat->slug;
	$next2_edition_cat_name = $next2_edition_cat->name;
	
	//Next Month - 1

	$next1_enews_edition_unix = strtotime("+1 month", $enews_edition_unix);
	$next1_edition_cat = $wpdb->get_var("SELECT option_name FROM wp_4_options WHERE option_value LIKE '%$next1_enews_edition_unix%' ");
	$next1_edition_cat_id = str_replace("taxonomy_", "", $next1_edition_cat); //THIS is the ID of the previous category, based on the unix
	$next1_edition_cat = get_category($next1_edition_cat_id);
	$next1_edition_cat_slug = $next1_edition_cat->slug;
	$next1_edition_cat_name = $next1_edition_cat->name;
	
	?>    
    
    

    <nav>
    <ul>
    	<li><a href="#">eNews Archives</a>
        <ul>
        <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous3_edition_cat_slug; ?>"><?php print $previous3_edition_cat_name; ?></a></li>
        <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous2_edition_cat_slug; ?>"><?php print $previous2_edition_cat_name; ?></a></li>
        	<li><a href="<?php echo home_url(); ?>/news/enews/<?php print $previous1_edition_cat_slug; ?>"><?php print $previous1_edition_cat_name; ?></a></li>
            <li>&gt; <?php single_cat_title(); ?></li>
            <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $next1_edition_cat_slug; ?>"><?php print $next1_edition_cat_name; ?></a></li>
        <li><a href="<?php echo home_url(); ?>/news/enews/<?php print $next2_edition_cat_slug; ?>"><?php print $next2_edition_cat_name; ?></a></li>
        	<li><a href="<?php echo home_url(); ?>/news/enews/<?php print $next3_edition_cat_slug; ?>"><?php print $next3_edition_cat_name; ?></a></li>
        </ul></li></ul></nav>
        
        

<?php get_sidebar( 'page-nav-2' ); ?>
</div>

<?php if ( is_active_sidebar( 'enews-widgets' ) ) : ?>
		<div class="widgets"><?php dynamic_sidebar( 'enews-widgets' ); ?></div>
<?php endif; ?>


</aside>

</div><!--/#content-->

<?php get_footer(); ?>