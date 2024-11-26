<?php
/**
 * Forelektrik Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Forelektrik_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function forelektrik_theme_setup() {
	// Mevcut kodlar...
    
    // WooCommerce Desteği Eklendi
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Menü Konumları - Mevcut kodlara ekleme
    register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'forelektrik_theme' ),
            'categories_menu' => esc_html__( 'Categories Menu', 'forelektrik_theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'forelektrik_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function forelektrik_theme_content_width() {
	// Mevcut kod...
}
add_action( 'after_setup_theme', 'forelektrik_theme_content_width', 0 );

/**
 * Register widget area.
 */
function forelektrik_theme_widgets_init() {
	// Mevcut kodlar...
}
add_action( 'widgets_init', 'forelektrik_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function forelektrik_theme_scripts() {
    // Mevcut kodlar...

    // Bootstrap CSS eklendi
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    
    // Font Awesome eklendi
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css');
    
    // Bootstrap JS eklendi
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'forelektrik_theme_scripts' );

// Mevcut diğer include'lar...
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

// Yeni WooCommerce fonksiyonları
function theme_woocommerce_setup() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'theme_woocommerce_setup');

// Mini sepet içeriği için AJAX fonksiyonu
function update_mini_cart() {
    echo wc_get_template('cart/mini-cart.php');
    die();
}
add_action('wp_ajax_update_mini_cart', 'update_mini_cart');
add_action('wp_ajax_nopriv_update_mini_cart', 'update_mini_cart');