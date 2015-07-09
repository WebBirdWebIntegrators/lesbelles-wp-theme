<?php
	
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'woocommerce' );
add_theme_support( "title-tag" );


function webbird_load_editor_style() {
  add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'webbird_load_editor_style' );

update_option('thumbnail_size_w', 150);
update_option('thumbnail_size_h', 150);
update_option('medium_size_w', 300);
update_option('medium_size_h', 300);
update_option('large_size_w', 600);
update_option('large_size_h', 600);

add_image_size( 'aanbod', 2400, 1300, true );
add_image_size( 'afwerking', 2400, 1300, true );

add_filter( 'image_size_names_choose', 'webbird_custom_image_sizes' );

function webbird_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
	    'aanbod' => __( 'Aanbod', 'lesbelles' ),
	    'afwerking' => __( 'Afwerking', 'lesbelles' ),
    ) );
}

// Auto create menus
$menu_header_mnav = 'Header - Main navigation';
$menu_header_mnav_exists = wp_get_nav_menu_object( $menu_header_mnav );

if( !$menu_header_mnav_exists) {
$menu_header_mnav_id = wp_create_nav_menu( $menu_header_mnav );
}

$menu_header_fnav = 'Header - Functional navigation';
$menu_header_fnav_exists = wp_get_nav_menu_object( $menu_header_fnav );

if( !$menu_header_fnav_exists) {
$menu_header_fnav_id = wp_create_nav_menu( $menu_header_fnav );
}

$menu_footer_nav = 'Footer - Navigation';
$menu_footer_nav_exists = wp_get_nav_menu_object( $menu_footer_nav );

if( !$menu_footer_nav_exists) {
$menu_footer_nav_id = wp_create_nav_menu( $menu_footer_nav );
}

register_nav_menus( 
	array (
		'header-mnav' => 'Header - Main navigation',
		'header-fnav' => 'Header - Functional navigation',
		'footer-nav' => 'Footer - Navigation',
	)
);

if ( ! isset( $content_width ) ) $content_width = 600;

require_once( 'functions-inc/wordpress-dashboard.php' );

function webbird_login_stylesheet() {
    wp_enqueue_style( 'custom-login' , get_template_directory_uri() . '/css/wordpress.css' );
}
add_action( 'login_enqueue_scripts' , 'webbird_login_stylesheet' );

function webbird_login_logo_url() {
    return 'http://www.webbird.be';
}
add_filter( 'login_headerurl' , 'webbird_login_logo_url' );

function webbird_login_logo_url_title() {
    return 'WebBird | Website & webshop architects';
}
add_filter( 'login_headertitle' , 'webbird_login_logo_url_title' );

add_action('wp_enqueue_scripts' , 'webbird_scripts');

function webbird_scripts() {
	wp_enqueue_script('jquery');
	
	wp_register_style( 'webbird-styles' , get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style( 'webbird-styles' );
		
	wp_register_style( 'fontawesome' , get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome' );
	
	wp_register_script( 'flexslider' , get_template_directory_uri() . '/js/jquery.flexslider.js' );
	wp_enqueue_script( 'flexslider' );
	
	wp_register_script( 'black-and-white-images' , get_template_directory_uri() . '/js/jquery.BlackAndWhite.min.js' );
	wp_enqueue_script( 'black-and-white-images' );
}

$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );


if ( ! function_exists( 'webbird_sidebar_default' ) ) {

// Register Sidebar
function webbird_sidebar_default() {

	$args = array(
		'id'            => 'sidebar1',
		'name'          => __( 'Default', 'lesbelles' ),
		'description'   => __( 'Default sidebar', 'lesbelles' ),
		'class'         => 'sidebar-default',
		'before_widget' => '<div class="sidebar-default %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'webbird_sidebar_default' );

}
add_action( 'wp_before_admin_bar_render', 'webbird_wp_before_admin_bar_render' ); 
 
function webbird_wp_before_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->add_node( array(
        'id'    => 'webbird-support',
        'title' => 'Contact WebBird Support',
        'href'  => 'https://webbird.zendesk.com/hc/nl/requests/new',
        'meta'  => array( 'target' => '_blank' )
    ) );
}

add_action( 'activity_box_end', 'activity_box_end_example' );
 
function activity_box_end_example() {
   _e( "If you have any questions, you can reach WebBird's support at" );
   echo '&nbsp;<a href="mailto:support@webbird.be">support@webbird.be</a>.';
}

add_action( 'wp_head', 'wp_head_example' );
 
function wp_head_example() {
    global $post;
     
    // default image
    $site_logo = get_stylesheet_directory_uri() . '/images/logo.png';
     
    // homepage
    if ( is_home() ) {
        echo '<meta property="og:type" content="website" />';
        echo '<meta property="og:url" content="' . get_bloginfo( 'url' ) . '" />';
        echo '<meta property="og:title" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />';
        echo '<meta property="og:image" content="' . $site_logo . '" />';
        echo '<meta property="og:description" content="' . esc_attr( get_bloginfo( 'description' ) ) . '" />';
    }
     
    // single post or page
    elseif ( is_singular() ) {
        echo '<meta property="og:type" content="article" />';
        echo '<meta property="og:url" content="' . get_permalink() . '" />';
        echo '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '" />';
        if ( has_post_thumbnail( $post->ID ) ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            echo '<meta property="og:image" content="' . esc_attr( $image[0] ) . '" />';
        } else
            echo '<meta property="og:image" content="' . $site_logo . '" />';
        echo '<meta property="og:description" content="' . esc_attr( get_the_excerpt() ) . '" />';
    }
}

function webbird_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	} // end if

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	} // end if

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'lesbelles' ), max( $paged, $page ) ) . " $sep $title";
	} // end if

	return $title;

} // end webbird_wp_title
add_filter( 'wp_title', 'webbird_wp_title', 10, 2 );


add_filter( 'the_content', 'webbird_featured_image_in_feed' );

function webbird_featured_image_in_feed( $content ) {
    global $post;
    if( is_feed() ) {
        if ( has_post_thumbnail( $post->ID ) ){
            $output = get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'float:right; margin:0 0 10px 10px;' ) );
            $content = $output . $content;
        }
    }
    return $content;
}

// Move Yoast SEO meta box to the bottom
function webbird_move_yoast_seo_to_bottom() {
	return 'low';
}

add_filter( 'wpseo_metabox_prio', 'webbird_move_yoast_seo_to_bottom');

function remove_box() {
	remove_post_type_support('page', 'title');
	remove_post_type_support('page', 'editor');
}

add_action("admin_init", "remove_box");

?>