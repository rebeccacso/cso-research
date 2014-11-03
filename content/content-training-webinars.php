<?php 
	  //http://www.php.net//manual/en/function.time.php
	  $yesterday = time() - (1 * 24 * 60 * 60); 
	  
	  
$main_webinar_query = new WP_Query( array(
	'post_type' => 'events',
	'meta_key' => 'be_event_start',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array(
		array(
		'key' => 'be_event_start',
		'meta_value' => $value,
		'value' => $yesterday,
		'compare' => '>='
		)
	)
)); ?>

<div class="webinar-description">
<?php


if ( $main_webinar_query->have_posts() ) : while ( $main_webinar_query->have_posts() ) : $main_webinar_query->the_post(); ?>


<div>
<h4><?php the_title(); ?></h4>
<p><?php the_content(); ?></p>
</div>

      <?php endwhile; else: ?>
      <p>Sorry, there are currently no upcoming training webinars. You can always watch recordings of past webinars on the <a href="<?php home_url(); ?>/client-services/university/webinars/archive/">webinar archives</a> page.</p>
      <?php endif; ?>
      
          <?php wp_reset_postdata(); ?>
          </div>
<hr />

<?php 
	  //http://www.php.net//manual/en/function.time.php
	  $yesterday = time() - (1 * 24 * 60 * 60);
$webinar_query = new WP_Query( array(
	'post_type' => 'events',
	'meta_key' => 'be_event_start',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array(
		array(
		'key' => 'be_event_start',
		'meta_value' => $value,
		'value' => $yesterday,
		'compare' => '>='
		)
	)
));

if ( $webinar_query->have_posts() ) : while ( $webinar_query->have_posts() ) : $webinar_query->the_post(); ?>



<div class="webinar">
<h4><?php the_title(); ?></h4> 
<p><strong><time datetime="<?php the_time('Y-m-d' ); ?>" pubdate="pubdate"><?php global $post;
$time = get_post_meta( $post->ID, 'be_event_start', true );
echo date( 'F j', $time ); ?></time></strong> - <time datetime="<?php the_time('Y-m-d' ); ?>" pubdate="pubdate"><?php global $post;
$time = get_post_meta( $post->ID, 'be_event_start', true );
echo date( 'l', $time ); ?></time></p>
<p><time datetime="<?php the_time('Y-m-d' ); ?>" pubdate="pubdate"><?php global $post;
$time = get_post_meta( $post->ID, 'be_event_start', true );
echo date( 'g:ia', $time ); ?></time> - <time datetime="<?php the_time('Y-m-d' ); ?>" pubdate="pubdate"><?php global $post;
$time = get_post_meta( $post->ID, 'be_event_end', true );
echo date( 'g:ia', $time ); ?></time> CT</p>
<p class="button-blue"><a href="<?php echo get_post_meta($post->ID, "be_webinar_url", true); ?>" target="_blank">Register</a></p>
</div>

      <?php endwhile;?>
      <?php endif; ?>
      
          <?php wp_reset_postdata(); ?>
        