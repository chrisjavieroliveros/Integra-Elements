<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', get_theme_mod('integra_theme_version', '1.0.0'));
}

/*
 * ==========================================================================
 * Core Theme Functions - Active Development Area
 * ==========================================================================
 */

function integra_elements_scripts() {

    // Custom jQuery - Load first to ensure availability for all scripts
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '3.6.4', false);
    wp_enqueue_script('jquery');
    
    // Theme Style & Script
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('integra-elements-style', get_template_directory_uri() . '/assets/css/integra-elements.min.css', array(), _S_VERSION);
    wp_enqueue_script('integra-elements-js', get_template_directory_uri() . '/js/integra-elements.js', array('jquery'), _S_VERSION, true);

    // GSAP Animation Library
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), '3.13.0', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap'), '3.13.0', true);
    wp_enqueue_script('gsap-scrollsmoother', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js', array('gsap', 'gsap-scrolltrigger'), '3.13.0', true);
    wp_enqueue_script('gsap-flip', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/Flip.min.js', array('gsap'), '3.13.0', true);
    wp_enqueue_script('gsap-splittext', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js', array('gsap'), '3.13.0', true);

    // Swiper CSS + JS
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    // Theme Scripts
    wp_enqueue_script('integra-scroll-smoother', get_template_directory_uri() . '/js/scroll-smoother.js', array('gsap', 'gsap-scrolltrigger', 'gsap-scrollsmoother'), _S_VERSION, true);
    wp_enqueue_script('integra-elements-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'integra_elements_scripts');

function integra_elements_elementor_support() {
    if (!did_action('elementor/loaded')) {
        return;
    }

    if (!version_compare(ELEMENTOR_VERSION, '3.5.0', '>=')) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p>' . 
                 esc_html__('Integra Elements requires Elementor version 3.5.0 or greater.', 'integra-elements') . 
                 '</p></div>';
        });
        return;
    }

    require get_template_directory() . '/inc/elementor-widgets.php';
}
add_action('after_setup_theme', 'integra_elements_elementor_support');

/*
 * ==========================================================================
 * WordPress Required Functions - Standard Setup
 * ==========================================================================
 */

function integra_elements_setup() {
    load_theme_textdomain('integra-elements', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'navigation' => esc_html__('Navigation', 'integra-elements'),
        'footer' => esc_html__('Footer', 'integra-elements'),
    ));

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
    ));

    add_theme_support('custom-background', apply_filters('integra_elements_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'integra_elements_setup');

// /**
//  * Set the content width in pixels, based on the theme's design and stylesheet.
//  *
//  * Priority 0 to make it available to lower priority callbacks.
//  *
//  * @global int $content_width
//  */
// function integra_elements_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'integra_elements_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'integra_elements_content_width', 0 );

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
 * Load Integra Elements admin page.
 */
require get_template_directory() . '/inc/admin/integra-admin.php';


