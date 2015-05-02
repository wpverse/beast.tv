<?php
/**
 * Neochrome BeastTV functions and definitions
 *
 * @package Neochrome BeastTV
 */

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


}


add_action( 'init', 'create_city_taxonomy', 0 );

// create two taxonomies, Citys and Locations for the post type "book"
function create_city_taxonomy() {
  // Portfolio City taxonomy, make it hierarchical (like cities)
	$labels = array(
		'name'              => _x( 'Cities', 'taxonomy general name' ),
		'singular_name'     => _x( 'City', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Cities' ),
		'all_items'         => __( 'All Cities' ),
		'parent_item'       => __( 'Parent City' ),
		'parent_item_colon' => __( 'Parent City:' ),
		'edit_item'         => __( 'Edit City' ),
		'update_item'       => __( 'Update City' ),
		'add_new_item'      => __( 'Add New City' ),
		'new_item_name'     => __( 'New City Name' ),
		'menu_name'         => __( 'City' ),
		);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'city' ),
		);

	register_taxonomy( 'city', array( 'portfolio','user','sales-contact' ), $args );

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
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'beast-style', get_stylesheet_uri() );
	wp_enqueue_style( 'meanmenu-style', get_template_directory_uri().'/css/meanmenu.min.css' );

	if (!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, null);
		wp_enqueue_script('jquery');
		// not currently including jquery migrate
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), $version, true );
	wp_enqueue_script( 'beast-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), $version, true );
	//wp_enqueue_script( 'beast-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $version, true );
	wp_enqueue_script( 'beast-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $version, true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array('jquery'), $version, true );

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





// Add term page
function beast_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[custom_term_meta]"><?php _e( 'Example meta field', 'beast' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','beast' ); ?></p>
	</div>
	<?php
}
add_action( 'city_add_form_fields', 'beast_taxonomy_add_new_meta_field', 10, 2 );


// Edit term page
function beast_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e( 'City Address', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr( $term_meta['custom_term_meta'] ) ? esc_attr( $term_meta['custom_term_meta'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
<?php
}

add_action( 'city_edit_form_fields', 'beast_taxonomy_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_city', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_city', 'save_taxonomy_custom_meta', 10, 2 );
