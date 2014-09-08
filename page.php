<?php get_header(); ?>

<!--CONTENT-->
<div id="content">
 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="title-bar">
<div class="img-gradient"></div>
<h1><?php the_title(); ?></h1>
<h2>> Co-op/Intern</h2>
</div>
<div class="breadcrumbs">
<p><a href="home">Home</a> / <a href="/products">Products</a> / <a href="products/cso-system">The CSO System</a> / Co-op/Intern</p>
</div>

<div class="sidebar-icon top"><a href="#sidebar">
<?php get_template_part('img/icons/inline', 'chevron-down-circle.svg'); ?> <p>navigation</p></a>
</div>




<div class="main">
<?php the_content(); ?>
</div>

<div class="sidebar-icon bottom"><a href="#header">
<?php get_template_part('img/icons/inline', 'chevron-up-circle.svg'); ?> <p>top</p></a>
</div>

<aside id="sidebar">
<div class="menus"><nav><ul>
<li><a href="#">THE CSO SYSTEM</a>
<ul><li>> Co-op/Intern</li>
<li><a href="#">Enterprise</a></li>
<li><a href="#">Add-Ons</a></li>
</ul></li></ul></nav>
<nav><ul>
<li><a href="#">CSO LAW</a></li></ul></nav>
<nav><ul>
<li><a href="#">REQUEST A DEMO</a></li></ul>
</nav>
<nav><ul>
<li><a href="#">SUPPORT</a>
<ul><li><a href="#">Chat live</a></li>
<li><a href="#">Submit ticket</a></li>
<li><a href="#">Email us</a></li>
<li><a href="#">Call support</a></li>
</ul></li></ul></nav></div>
<div class="widgets">
widgets can go here</div>


</aside>
    <?php endwhile; else: ?>
    <p><?php _e( 'Sorry, this page is not currently available.' ); ?></p>
    <?php endif; ?>

</div><!--/#content-->

<?php get_footer(); ?>