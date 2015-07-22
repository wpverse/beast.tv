<?php
/**
 * Neochrome BeastTV functions and definitions
 *
 * @package Neochrome BeastTV
 */

add_theme_support( 'post-thumbnails' );


// adding CMB2
include_once "functions-metaboxes.php";


/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'beast_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beast_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Neochrome BeastTV, use a find and replace
	 * to change 'beast' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'beast', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beast' ),
		) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beast_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );


	add_image_size( 'hd_background', 2560, 9999 );
add_image_size( 'sixteen_nine_background', 1140, 641, true );

}
endif; // beast_setup
add_action( 'after_setup_theme', 'beast_setup' );



add_action( 'init', 'beast_custom_post_types_init' );
/**
 * Register a Portfolio post type
 * yes.. we are going with the 'elaborate' version.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function beast_custom_post_types_init() {
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', '_beast' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', '_beast' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', '_beast' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', '_beast' ),
		'add_new'            => _x( 'Add New', 'Portfolio', '_beast' ),
		'add_new_item'       => __( 'Add New Portfolio', '_beast' ),
		'new_item'           => __( 'New Portfolio', '_beast' ),
		'edit_item'          => __( 'Edit Portfolio', '_beast' ),
		'view_item'          => __( 'View Portfolio', '_beast' ),
		'all_items'          => __( 'All Portfolios', '_beast' ),
		'search_items'       => __( 'Search Portfolios', '_beast' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', '_beast' ),
		'not_found'          => __( 'No Portfolios found.', '_beast' ),
		'not_found_in_trash' => __( 'No Portfolios found in Trash.', '_beast' )
		);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
		);

	register_post_type( 'portfolio', $args );



	$contact_labels = array(
		'name'               => _x( 'Sales Contacts', 'post type general name', '_beast' ),
		'singular_name'      => _x( 'Sales Contact', 'post type singular name', '_beast' ),
		'menu_name'          => _x( 'Sales Contacts', 'admin menu', '_beast' ),
		'name_admin_bar'     => _x( 'Sales Contact', 'add new on admin bar', '_beast' ),
		'add_new'            => _x( 'Add New', 'Sales Contact', '_beast' ),
		'add_new_item'       => __( 'Add New Sales Contact', '_beast' ),
		'new_item'           => __( 'New Sales Contact', '_beast' ),
		'edit_item'          => __( 'Edit Sales Contact', '_beast' ),
		'view_item'          => __( 'View Sales Contact', '_beast' ),
		'all_items'          => __( 'All Sales Contacts', '_beast' ),
		'search_items'       => __( 'Search Sales Contacts', '_beast' ),
		'parent_item_colon'  => __( 'Parent Sales Contacts:', '_beast' ),
		'not_found'          => __( 'No Sales Contacts found.', '_beast' ),
		'not_found_in_trash' => __( 'No Sales Contacts found in Trash.', '_beast' )
		);

$contact_args = array(
	'labels'             => $contact_labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'sales-contact' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
	);

register_post_type( 'sales-contact', $contact_args );

$manager_labels = array(
		'name'               => _x( 'Managers', 'post type general name', '_beast' ),
		'singular_name'      => _x( 'Manager', 'post type singular name', '_beast' ),
		'menu_name'          => _x( 'Managers', 'admin menu', '_beast' ),
		'name_admin_bar'     => _x( 'Manager', 'add new on admin bar', '_beast' ),
		'add_new'            => _x( 'Add New', 'Manager', '_beast' ),
		'add_new_item'       => __( 'Add New Manager', '_beast' ),
		'new_item'           => __( 'New Manager', '_beast' ),
		'edit_item'          => __( 'Edit Manager', '_beast' ),
		'view_item'          => __( 'View Manager', '_beast' ),
		'all_items'          => __( 'All Managers', '_beast' ),
		'search_items'       => __( 'Search Managers', '_beast' ),
		'parent_item_colon'  => __( 'Parent Managers:', '_beast' ),
		'not_found'          => __( 'No Managers found.', '_beast' ),
		'not_found_in_trash' => __( 'No Managers found in Trash.', '_beast' )
		);

$manager_args = array(
	'labels'             => $manager_labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'manager' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
	);

register_post_type( 'manager', $manager_args );


$city_labels = array(
	'name'               => _x( 'Cities', 'post type general name', '_beast' ),
	'singular_name'      => _x( 'City', 'post type singular name', '_beast' ),
	'menu_name'          => _x( 'Cities', 'admin menu', '_beast' ),
	'name_admin_bar'     => _x( 'City', 'add new on admin bar', '_beast' ),
	'add_new'            => _x( 'Add New', 'City', '_beast' ),
	'add_new_item'       => __( 'Add New City', '_beast' ),
	'new_item'           => __( 'New City', '_beast' ),
	'edit_item'          => __( 'Edit City', '_beast' ),
	'view_item'          => __( 'View City', '_beast' ),
	'all_items'          => __( 'All Cities', '_beast' ),
	'search_items'       => __( 'Search Cities', '_beast' ),
	'parent_item_colon'  => __( 'Parent Cities:', '_beast' ),
	'not_found'          => __( 'No Cities found.', '_beast' ),
	'not_found_in_trash' => __( 'No Cities found in Trash.', '_beast' )
	);

$city_args = array(
	'labels'             => $city_labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'cities' ),
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'revisions')
	);

register_post_type( 'city', $city_args );

	$slidelabels = array(
		'name'               => _x( 'Slides', 'post type general name', '_beast' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', '_beast' ),
		'menu_name'          => _x( 'Home Slides', 'admin menu', '_beast' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', '_beast' ),
		'add_new'            => _x( 'Add New', 'Slide', '_beast' ),
		'add_new_item'       => __( 'Add New Slide', '_beast' ),
		'new_item'           => __( 'New Slide', '_beast' ),
		'edit_item'          => __( 'Edit Slide', '_beast' ),
		'view_item'          => __( 'View Slide', '_beast' ),
		'all_items'          => __( 'All Slides', '_beast' ),
		'search_items'       => __( 'Search Slides', '_beast' ),
		'parent_item_colon'  => __( 'Parent Slides:', '_beast' ),
		'not_found'          => __( 'No Slides found.', '_beast' ),
		'not_found_in_trash' => __( 'No Slides found in Trash.', '_beast' )
		);

	$slideargs = array(
		'labels'             => $slidelabels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail')
		);

	register_post_type( 'home-slides', $slideargs );

}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function beast_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'beast' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
}
add_action( 'widgets_init', 'beast_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beast_scripts() {
	$my_theme = wp_get_theme();
	$version = $my_theme->get( 'Version' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
		wp_enqueue_style( 'flexslider-style', get_template_directory_uri().'/css/flexslider.css' );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'beast-style', get_stylesheet_uri() );
	wp_enqueue_style( 'meanmenu-style', get_template_directory_uri().'/css/meanmenu.min.css' );
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=EB+Garamond' );


	if (!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, null);
		wp_enqueue_script('jquery');

		// not currently including jquery migrate
wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/js/jquery.lazyload.js', array('jquery'), $version, true );

	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), $version, true );
	wp_enqueue_script( 'beast-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), $version, true );
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '1.3.3', true );
	//wp_enqueue_script( 'beast-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $version, true );
	wp_enqueue_script( 'beast-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $version, true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array('jquery'), $version, true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array('jquery'), $version, true );
wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), $version, true );

// Do not call 'froogaloop', use modified name. WP froogaloop library does not have vimeo fix update yet.
wp_enqueue_script( 'froogaloopNew', get_stylesheet_directory_uri() . '/js/froogaloop.js', array('jquery'), $version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beast_scripts' );


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

//$query->is_main_query()
function reorder_cities( $query ) {
	if ( $query->is_archive() && is_post_type_archive( 'city' ) ) {
		$query->set( 'order', 'ASC' );
		$query->set( 'orderby', 'title' );
		//print_r($query);
		//echo '<br>post_type: ';
		//print_r($query->post_type);
	}
}
add_action( 'pre_get_posts', 'reorder_cities' );


function vimeo_processing($content){

$player_url = str_replace( "https://vimeo.com/" , "https://player.vimeo.com/video/" ,$content );

// Width and height are needed for correct aspect ratio even though we don't use those sizes.
$content = '<iframe src="'.$player_url.'?api=1" width="640" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
//testing

write_log("$player_url: ".$player_url);
write_log("$content: ".$content);

return $content;
}
//add_filter( 'the_content', 'vimeo_processing',5 );

if (!function_exists('write_log')) {
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}
