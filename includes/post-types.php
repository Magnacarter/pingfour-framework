<?php
/**
 * Build CPTs
 *
 * @package Pingfour\theme\includes
 * @since 1.0.0
 */

namespace Pingfour\theme\includes;

$testimonial   = new Pingfour_Theme( 'testimonial' );
$page_supports = array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' );
$post_supports = array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' );

/**
 * Custom Post Type: Testimonial
 */
$testimonial->build_cpt( 'testimonials', 'Testimonial', 'Testimonials', array( 'title', 'editor', 'thumbnail', 'excerpt' ) );

/**
 * Custom category: Testimonial
 */
$testimonial->build_cats( 'Testimonial Category', 'Testimonial Categories' );

