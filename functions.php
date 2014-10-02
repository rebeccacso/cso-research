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

/* SHORTCODES */

// https://github.com/halfempty/template-part-shortcode

function cso_template_part_shortcode_clientsvcs( $atts ) {

	extract( shortcode_atts( array(
		'icon' => '',
	), $atts ) );

	$file = locate_template('img/icons/support/inline-' . $icon . '.svg.php');

    ob_start();
    include $file;
    $template = ob_get_contents();
    ob_end_clean();
    return $template;

}
add_shortcode( 'cs-icon', 'cso_template_part_shortcode_clientsvcs' );


function cso_template_part_shortcode_icons( $atts ) {

	extract( shortcode_atts( array(
		'icon' => '',
	), $atts ) );

	$file = locate_template('img/icons/inline-' . $icon . '.svg.php');

    ob_start();
    include $file;
    $template = ob_get_contents();
    ob_end_clean();
    return $template;

}
add_shortcode( 'icon', 'cso_template_part_shortcode_icons' );

function cso_template_part_shortcode_content( $atts ) {

	extract( shortcode_atts( array(
		'name' => '',
	), $atts ) );

	$file = locate_template('content/content-' . $name . '.php');

    ob_start();
    include $file;
    $template = ob_get_contents();
    ob_end_clean();
    return $template;

}
add_shortcode( 'content', 'cso_template_part_shortcode_content' );


function cso_div_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => '',
	), $atts ) );
	return '<div class="' . $class . '">' . $content . '</div>';
}
add_shortcode( 'div', 'cso_div_shortcode' );


// Custom Search Results Page for Client Services

 function cso_template_chooser($template)   
{    
  global $wp_query;   
  $search = get_query_var('search');   
  if( $wp_query->is_search && $search == 'client-services' )   
  {
    return locate_template('search-client-services.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'cso_template_chooser'); 

/* ADD PAGE EXCERPT */

add_action('init', 'cso_page_excerpt');

function cso_page_excerpt() {
	add_post_type_support( 'page', 'excerpt' );
}


/* ADD META to CATEGORIES */
//https://pippinsplugins.com/adding-custom-meta-fields-to-taxonomies/

// Add term page
function cso_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[enews_edition]"><?php _e( 'eNews Edition', 'pippin' ); ?></label>
		<input type="text" name="term_meta[enews_edition]" id="term_meta[enews_edition]" value="">
		<p class="description"><?php _e( 'Enter the edition of the eNews, in the format yyyy-mm','pippin' ); ?></p>
	</div>
<?php
}
add_action( 'category_add_form_fields', 'cso_taxonomy_add_new_meta_field', 10, 2 );


// Edit term page
function cso_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[enews_edition]"><?php _e( 'eNews Edition', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[enews_edition]" id="term_meta[custom_term_meta]" value="<?php echo date("Y-m", $term_meta['enews_edition'] ) ? date("Y-m", $term_meta['enews_edition'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter the edition of the eNews, in the format yyyy-mm','pippin' ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'category_edit_form_fields', 'cso_taxonomy_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = strtotime($_POST['term_meta'][$key]);
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_category', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_category', 'save_taxonomy_custom_meta', 10, 2 );
