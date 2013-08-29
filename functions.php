<?php
/**
 * nucleoaquimesmo-theme functions and definitions
 *
 * @package nucleoaquimesmo-theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'nucleoaquimesmo_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function nucleoaquimesmo_theme_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on nucleoaquimesmo-theme, use a find and replace
	 * to change 'nucleoaquimesmo-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nucleoaquimesmo-theme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'home-projetos', 320, 250, true ); //(cropped)
	add_image_size( 'header-projetos', 1280, 500, true ); //(cropped)
	add_image_size( 'projetos', 300, 550, true ); //(cropped)
	add_image_size( 'archive-projetos', 550, 300, true ); //(cropped)
	

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'nucleoaquimesmo_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nucleoaquimesmo_theme_setup
add_action( 'after_setup_theme', 'nucleoaquimesmo_theme_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function nucleoaquimesmo_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nucleoaquimesmo-theme' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Facebook', 'nucleoaquimesmo-theme' ),
		'id'            => 'sidebar-facebook',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'nucleoaquimesmo_theme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function nucleoaquimesmo_theme_scripts() {
	wp_enqueue_style( 'nucleoaquimesmo-theme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'twentyeleven-style', get_template_directory_uri() . '/twentyeleven-style.css' );

	wp_enqueue_script( 'nucleoaquimesmo-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'nucleoaquimesmo-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'nucleoaquimesmo-theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'nucleoaquimesmo_theme_scripts' );

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

//Adiciona o CustomPostType Agenda
require_once ( get_stylesheet_directory() . '/agenda/requires-agenda.php' );

// Adiciona a função the_excerpt às Páginas
	add_post_type_support( 'page', 'excerpt' );


/**
 * Load CPT Projetos.
 */
require get_template_directory() . '/custom-projetos.php';

function thumbnail_bg ( $tamanho = 'thumbnail' ) {
	global $post;
    $get_post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $tamanho, false, '' );
    echo 'style="background: url('.$get_post_thumbnail[0].' )"';
}

/*add_action ( 'wp', 'teste' );*/
function teste() {
	global $wp_query;
	print_r( $wp_query );
}

function id_por_slug( $slug ) {
    $page = get_page_by_path( $slug, '', 'projetos' );
    if ( $page ) {
        return $page->ID;
    } else {
        return null;
    }
}


function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_single()&&($post->post_parent==$pid)) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};
