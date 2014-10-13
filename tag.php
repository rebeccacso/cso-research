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
<p><a href="<?php home_url(); ?>">Home</a> / <a href="<?php site_url(); ?>/news">News &amp; Events</a> / <a href="<?php site_url(); ?>/news/enews">CSO eNews</a> / Articles Tagged: "<?php single_tag_title(); ?>"</p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">


<h2>Articles tagged with "<?php single_tag_title(); ?>":</h2>
<div class="content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
//grab the category for later use
$category = get_the_category();
?>
     
<h3><a href="<?php home_url(); ?>/news/enews/<?php echo $category[0]->slug; ?>#<?php echo $post->post_name; ?>"><?php the_title(); ?></a></h3> 
<div class="tags"><p><span><?php the_category('</span><span>'); ?></span></p></div>
<?php the_content(); ?>

 <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, there are currently no articles tagged with "'. single_tag_title() .'".' ); ?></p>
    <?php endif; ?>
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
	'exclude'            => '1',
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