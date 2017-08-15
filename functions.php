<?php
/**
 * Functions for pingfour theme
 *
 * @package Pingfour\theme
 * @since 1.0.0
 * @author Pingfour
 * @licence GNU-2.0+
 */

namespace Pingfour\theme;

define( 'JS_VERS', '1.0.0' );
define( 'CSS_VERS', '1.0.0' );

require_once STYLESHEETPATH . '/includes/pingfour-theme-class.php';
require_once STYLESHEETPATH . '/includes/post-types.php';
require_once STYLESHEETPATH . '/includes/walker.php';

/**
 * Load scripts and styles for the theme
 *
 * @return void
 * @add_action wp_enqueue_scripts
 */
function enqueue_scripts() {
	wp_enqueue_style  ( 'pingfour-bootstrap',       get_template_directory_uri() . '/assets/dist/css/bootstrap.css' );
	wp_enqueue_style  ( 'pingfour-main',            get_template_directory_uri() . '/assets/dist/css/main.css', false, CSS_VERS );
	wp_enqueue_style  ( 'pingfour-stylesheet',      get_template_directory_uri() . '/style.css', false, CSS_VERS );
	wp_enqueue_script ( 'pingfour-bootstrap-js',    get_template_directory_uri() . '/assets/dist/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script ( 'pingfour-theme-js',        get_template_directory_uri() . '/assets/dist/js/theme.js', array( 'jquery' ), JS_VERS, true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );

/**
 * Add header and footer menus
 *
 * @return void
 * @add_action init
 */
function register_menus() {
	register_nav_menus(
		array(
			'header-menu'       => __( 'Header Menu' ),
			'footer-menu'       => __( 'Footer Menu' ),
			'sub-footer-menu'   => __( 'Sub Footer Menu' ),
			'mobile-menu'       => __( 'Mobile Menu' ),
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\register_menus' );

/**
 * Add featured images
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add excerpt field to pages
 *
 * @return void
 * @add_action init
 */
function add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', __NAMESPACE__ . '\add_excerpts_to_pages' );

/**
 * Filter the excerpt length
 *
 * @since 1.0.0
 * @return int 80
 * @add_filter excerpt_length
 */
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\custom_excerpt_length', 999 );
