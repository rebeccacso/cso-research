<?php

/* Title */

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