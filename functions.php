<?php
/**
 * Integra Elements functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Integra_Elements
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Get version from theme mod or use default
    $theme_version = get_theme_mod('integra_theme_version', '1.0.0');
    define( '_S_VERSION', $theme_version );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function integra_elements_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Integra Elements, use a find and replace
		* to change 'integra-elements' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'integra-elements', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// Theme navigation menus
	register_nav_menus(
		array(
			'navigation' => esc_html__( 'Navigation', 'integra-elements' ),
			'footer' => esc_html__( 'Footer', 'integra-elements' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'integra_elements_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'integra_elements_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function integra_elements_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'integra_elements_content_width', 640 );
}
add_action( 'after_setup_theme', 'integra_elements_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function integra_elements_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'integra-elements' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'integra-elements' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'integra_elements_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function integra_elements_scripts() {
	wp_enqueue_style( 'integra-elements-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'integra-elements-style', 'rtl', 'replace' );
	
	// Enqueue main.min.css from assets directory
	wp_enqueue_style( 'integra-elements-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION );
	
	// Enqueue GSAP scripts from CDN
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), '3.13.0', true );
	wp_enqueue_script( 'gsap-flip', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/Flip.min.js', array('gsap'), '3.13.0', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap'), '3.13.0', true );
	wp_enqueue_script( 'gsap-scrollsmoother', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js', array('gsap', 'gsap-scrolltrigger'), '3.13.0', true );
	wp_enqueue_script( 'gsap-splittext', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js', array('gsap'), '3.13.0', true );
	
	// Enqueue ScrollSmoother initialization script
	wp_enqueue_script( 'integra-scroll-smoother', get_template_directory_uri() . '/assets/js/scroll-smoother.js', array('gsap', 'gsap-scrolltrigger', 'gsap-scrollsmoother'), _S_VERSION, true );
	
	// Enqueue main.js from assets directory
	wp_enqueue_script( 'integra-elements-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'integra_elements_scripts' );

/**
 * Enqueue jQuery from Google CDN.
 */
function integra_elements_enqueue_jquery() {
    if (!is_admin()) {
        // Deregister the default WordPress jQuery
        wp_deregister_script('jquery');
        
        // Register jQuery from Google CDN
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '3.6.4', true);
        
        // Enqueue it
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'integra_elements_enqueue_jquery');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Elementor custom widgets if Elementor is active.
 */
function integra_elements_elementor_support() {
    // Check if Elementor is installed and activated
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Check Elementor version
    if ( ! version_compare( ELEMENTOR_VERSION, '3.5.0', '>=' ) ) {
        add_action( 'admin_notices', function() {
            echo '<div class="notice notice-error"><p>' . 
                 esc_html__( 'Integra Elements requires Elementor version 3.5.0 or greater.', 'integra-elements' ) . 
                 '</p></div>';
        } );
        return;
    }

    // Load our custom widgets
    require get_template_directory() . '/inc/elementor-widgets.php';
}
add_action( 'after_setup_theme', 'integra_elements_elementor_support' );

