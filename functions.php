<?php
/**
 * Heydonworks functions and definitions
 *
 * @package heydonworks
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'heydonworks_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function heydonworks_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on heydonworks, use a find and replace
	 * to change 'heydonworks' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'heydonworks', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'heydonworks' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'heydonworks_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // heydonworks_setup
add_action( 'after_setup_theme', 'heydonworks_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function heydonworks_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'heydonworks' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'heydonworks_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function heydonworks_scripts() {
	wp_enqueue_style( 'heydonworks-style', get_stylesheet_uri() );
	wp_enqueue_script( 'heydonworks-jquery', ( 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js' ), false, null, true );
	wp_enqueue_script( 'heydonworks-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'heydonworks_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Hide cunty admin bar
 */

add_filter('show_admin_bar', '__return_false');

function heydonworks_first_paragraph($content) {
// Testing to see if the content is a Page or Custom Post Type of school, if so, display the text normally (without the class = intro).
if ( 'school' == get_post_type() ) {
		return preg_replace('/<p([^>]+)?>/', '<p$1>', $content, 1);
	} else {
		return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);
	}
}
	add_filter('the_content', 'heydonworks_first_paragraph');

/**
 * Excerpt length
 */

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Excerpt 'more'
 */

function new_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * Put rels on pager
 */

add_filter('next_posts_link_attributes', 'next_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'previous_posts_link_attributes');

function next_posts_link_attributes() {
    return 'rel="next"';
}

function previous_posts_link_attributes() {
    return 'rel="prev"';
}

/**
 * Stop linking post images
 */

update_option('image_default_link_type', 'none');

/**
 * Modify home loop to exclude category
 */

function home_exclude_category( $wp_query ) { 

	if ( is_home() ) {

    $excluded = array( '-3' ); 
    // Note that this is a cleaner way to write: $wp_query->set('category__not_in', $excluded);
   set_query_var( 'category__not_in', $excluded );
}
 
}
add_action( 'pre_get_posts', 'home_exclude_category' );