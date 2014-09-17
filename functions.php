<?php

/* TITLE */

function cso_filter_wp_title( $currenttitle, $sep, $seplocal ) {
	
	//Grab the site name
	$site_name = get_bloginfo( 'name' );
	
	//Add the site name after the current page title
	$full_title = $site_name . $currenttitle;

	//If we are on the front_page or homepage append the description
	if ( is_front_page() || is_home() ) {
	//Grab the Site Description
	$site_desc = get_bloginfo( 'description' );
	//Append Site Description to title
	$full_title .= ' ' .$setp . ' ' . $site_desc;
}

//Return modified title
return $full_title;
}

//Hook into 'wp_title'
add_filter( 'wp_title', 'cso_filter_wp_title', 10, 3);



/* SIDEBARS */

$cso_page_nav_sidebar2 = array(
	'name'			=> 'Page Nav 2',
	'id'			=> 'page-nav-2',
	'description'	=> 'Additional in-page navigation, selected per page. Use the Custom Menu widget to add additional sidebar navigation. Leave the Title field blank. You can add multiple Custom Menus.',
	'before_widget' => '<nav>',
	'after_widget' 	=> '</nav>',
	);
	
register_sidebar( $cso_page_nav_sidebar2 );

$cso_page_content_sidebar = array(
	'name'			=> 'Page Content Sidebar',
	'id'			=> 'page-content',
	'description'	=> 'A place for page widgets, selected per page',
	);
	
register_sidebar( $cso_page_content_sidebar );

$cso_client_svcs_info_box = array(
	'name'			=> 'Client Services Info Box',
	'id'			=> 'client-svcs-info',
	'description'	=> 'Client serices pages ONLY. A place for a single text/HTML widget, selected per client services page.',
	'before_widget'	=> '<div class="info-box">',
	'after_widget'	=> '</div>',
	);
	
register_sidebar( $cso_client_svcs_info_box );
	
/* MENUS */

register_nav_menus(
	array(
	'header-nav' => 'Main dropdown navigation in header',
	'footer-nav' => 'Main navigation in footer',
	'client-svcs' => 'Navigation for Client Services pages'
	)
);

/* FEATURED IMAGE */

add_theme_support( 'post-thumbnails' );


/* SLUG */

//http://www.tcbarrett.com/2013/05/wordpress-how-to-get-the-slug-of-your-post-or-page/#.VBjC1hZiatc

function get_the_slug( $id=null ){
  if( empty($id) ):
    global $post;
    if( empty($post) )
      return ''; // No global $post var available.
    $id = $post->ID;
  endif;

  $slug = basename( get_permalink($id) );
  return $slug;
}

/**
 * Display the page or post slug
 *
 * Uses get_the_slug() and applies 'the_slug' filter.
 */
function the_slug( $id=null ){
  echo apply_filters( 'the_slug', get_the_slug($id) );
}