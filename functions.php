<?php
/**
 * Theme functions and definitions
 *
 * @package WordPress_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wordpress_starter_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size
    set_post_thumbnail_size( 1200, 9999 );

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'wordpress-starter-theme' ),
        )
    );

    // Switch default core markup to output valid HTML5
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

    // Add theme support for selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
}
add_action( 'after_setup_theme', 'wordpress_starter_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design
 */
function wordpress_starter_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'wordpress_starter_theme_content_width', 1200 );
}
add_action( 'after_setup_theme', 'wordpress_starter_theme_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function wordpress_starter_theme_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style(
        'wordpress-starter-theme-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // Enqueue comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'wordpress_starter_theme_scripts' );

/**
 * Custom excerpt length
 */
function wordpress_starter_theme_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wordpress_starter_theme_excerpt_length', 999 );

/**
 * Custom excerpt more string
 */
function wordpress_starter_theme_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wordpress_starter_theme_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments
 */
function wordpress_starter_theme_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'wordpress_starter_theme_pingback_header' );
