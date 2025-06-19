<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', get_theme_mod('integra_theme_version', '1.0.0'));
}

/*
 * ==========================================================================
 * Core Theme Functions - Active Development Area
 * ==========================================================================
 */

/**
 * Simple Google Fonts loader - just paste the Google Fonts HTML!
 * Copy the HTML from fonts.google.com and paste the stylesheet URL below.
 */
function integra_elements_enqueue_fonts() {
    // 👇 Just paste your Google Fonts URL here!
    $google_fonts_url = 'https://fonts.googleapis.com/css2?family=Anek+Bangla:wght@100..800&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap';
    
    // 💡 Pro Tip - Multiple Fonts: Just add &family= for each additional font
    // $google_fonts_url = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Open+Sans:wght@300;400;600&display=swap';
    
    // That's it! The function handles the rest automatically.
    if (!empty($google_fonts_url)) {
        // Enqueue Google Fonts properly using WordPress enqueue system
        wp_enqueue_style('integra-google-fonts', $google_fonts_url, array(), null);
        
        // Add preconnect links for performance
        add_action('wp_head', function() {
            echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
            echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
        }, 1);
    }
    
    return esc_url($google_fonts_url);
}

function integra_elements_scripts() {
    // Enqueue Google Fonts (handled by integra_elements_enqueue_fonts)
    integra_elements_enqueue_fonts();

    // Theme Config CSS;
    wp_enqueue_style('integra-theme-config', get_template_directory_uri() . '/assets/css/config.min.css', array(), _S_VERSION);

    // Theme Styles
    wp_enqueue_style('integra-elements-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('integra-elements-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), _S_VERSION);

    // GSAP Animation Library
    wp_enqueue_script('gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), '3.13.0', true);
    wp_enqueue_script('gsap-flip', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/Flip.min.js', array('gsap'), '3.13.0', true);
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap'), '3.13.0', true);
    wp_enqueue_script('gsap-scrollsmoother', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js', array('gsap', 'gsap-scrolltrigger'), '3.13.0', true);
    wp_enqueue_script('gsap-splittext', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js', array('gsap'), '3.13.0', true);

    // Theme Scripts
    wp_enqueue_script('integra-scroll-smoother', get_template_directory_uri() . '/assets/js/scroll-smoother.js', array('gsap', 'gsap-scrolltrigger', 'gsap-scrollsmoother'), _S_VERSION, true);
    wp_enqueue_script('integra-elements-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'integra_elements_scripts');

function integra_elements_enqueue_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), '3.6.4', true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'integra_elements_enqueue_jquery');

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


