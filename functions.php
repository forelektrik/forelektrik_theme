<?php
/**
 * Forelektrik Theme functions and definitions
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Temel tema kurulumu
 */
function forelektrik_theme_setup() {
    // Title tag desteği
    add_theme_support('title-tag');
    
    // Post thumbnails desteği
    add_theme_support('post-thumbnails');
    
    // Özel logo desteği
    add_theme_support('custom-logo');

    // Menüler
    register_nav_menus(array(
        'primary' => 'Ana Menü',
        'categories' => 'Kategoriler Menüsü'
    ));
}
add_action('after_setup_theme', 'forelektrik_theme_setup');

/**
 * Stil ve script dosyalarının yüklenmesi
 */
function forelektrik_theme_scripts() {
    // Ana stil dosyası
    wp_enqueue_style('forelektrik-style', get_stylesheet_uri());
    
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    
    // jQuery (WordPress ile birlikte geliyor)
    wp_enqueue_script('jquery');
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'forelektrik_theme_scripts');

/**
 * WooCommerce desteği
 */
function forelektrik_theme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'forelektrik_theme_add_woocommerce_support');