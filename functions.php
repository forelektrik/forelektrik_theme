<?php
/**
 * Forelektrik Theme functions and definitions
 *
 * @package Forelektrik_Theme
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
function forelektrik_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'forelektrik_theme'),
        'categories_menu' => esc_html__('Categories Menu', 'forelektrik_theme')
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'forelektrik_theme_setup');

/**
 * Set the content width in pixels
 */
function forelektrik_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters('forelektrik_theme_content_width', 640);
}
add_action('after_setup_theme', 'forelektrik_theme_content_width', 0);

/**
 * Register widget area
 */
function forelektrik_theme_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'forelektrik_theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'forelektrik_theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'forelektrik_theme_widgets_init');

/**
 * Enqueue scripts and styles
 */
function forelektrik_theme_scripts() {
    // Main stylesheet
    wp_enqueue_style('forelektrik_theme-style', get_stylesheet_uri(), array(), _S_VERSION);

    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

    // Navigation script
    wp_enqueue_script('forelektrik_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'forelektrik_theme_scripts');

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * WooCommerce specific functions
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Cart fragments
 */
function forelektrik_theme_cart_fragment($fragments) {
    ob_start();
    ?>
    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <?php
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'forelektrik_theme_cart_fragment');

/**
 * Remove default WooCommerce styles
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');