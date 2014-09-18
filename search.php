<?php get_header(); ?>

<!--CONTENT-->
<div id="content">


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
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p>','</p>');
} ?>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <h3><?php the_title(); ?></h3>
     <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; ?>
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

<?php get_sidebar( 'page-nav-2' ); ?>
</div>

<?php if ( is_active_sidebar( 'page-content' ) ) : ?>
		<div class="widgets"><?php dynamic_sidebar( 'page-content' ); ?></div>
<?php endif; ?>


</aside>


</div><!--/#content-->

<?php get_footer(); ?>