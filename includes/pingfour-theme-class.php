<?php
/**
 * Class : Pingfour Theme
 *
 * Build custom post types and some other helper functions
 *
 * @package Pingfour\theme\includes
 * @since 1.0.0
 */

namespace Pingfour\theme\includes;

/**
 * Class Pingfour Theme
 */
class Pingfour_Theme {

	/**
	 * var $post_type
	 */
	public $post_type;

	/**
	 * var $cpts
	 */
	protected $cpts;

	/**
	 * var $cats
	 */
	protected $cats;

	/**
	 * Constructor method; Register the Custom Post Type and then hook to "init"
	 *
	 * @param $post_type string
	 *
	 * @return void
	 */
	public function __construct( $post_type ) {

		$this->post_type = $post_type;
		$this->cpts      = array();
		$this->cats      = array();
		$cpt_name        = ( isset( $this->cpts[$this->post_type] ) ? $this->cpts[$this->post_type] : null );

		if ( ! post_type_exists( $cpt_name ) ) {

			//Register CPTs
			add_action( 'init', array( $this, 'register_cpt' ) );

			//Register CPT categories
			add_action( 'init', array( $this, 'register_cats' ) );

		}

	}

	/**
	 * Build the Custom Post Type
	 *
	 * @param $cpt_slug string
	 * @param $singular_label string
	 * @param $plural_label string
	 * @param $supports array
	 * @param $settings array
	 *
	 * @return void
	 */
	public function build_cpt( $cpt_slug, $singular_label, $plural_label, $supports = array(), $settings = array(), $has_arch = true, $hier = true ) {

		$labels = array(
			'name'               => __( $singular_label, $this->post_type ),
			'singular_name'      => __( $singular_label, $this->post_type ),
			'add_new'            => __( 'Add New ' . $singular_label, $this->post_type ),
			'add_new_item'       => __( 'Add ' . $singular_label, $this->post_type ),
			'edit_item'          => __( 'Edit ' . $singular_label, $this->post_type ),
			'new_item'           => __( 'New ' . $singular_label, $this->post_type ),
			'all_items'          => __( 'All ' . $plural_label, $this->post_type ),
			'view_item'          => __( 'View ' . $singular_label, $this->post_type ),
			'search_items'       => __( 'Search ' . $singular_label, $this->post_type ),
			'not_found'          => __( 'No event found', $this->post_type ),
			'not_found_in_trash' => __( 'No event found in Trash', $this->post_type ),
			'parent_item_colon'  => __( '' ),
			'menu_name'          => __( $plural_label ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'page',
			'taxonomies'         => array( 'category', 'post_tag' ),
			'can_export'         => true,
			'has_archive'        => $has_arch,
			'hierarchical'       => $hier,
			'menu_position'      => null,
			'rewrite'            => array( 'slug' => $cpt_slug, 'with_front' => false ),
			'supports'           => $supports
		);

		$this->cpts[$this->post_type] = array_merge( $args, $settings );

	}

	/**
	 * Register the Custom Post Type
	 *
	 * @return void
	 */
	public function register_cpt() {

		foreach ( $this->cpts as $key => $value ) {

			register_post_type( $key, $value );

		}

	}

	/**
	 * Build CPT categories
	 *
	 * @param $singular_label string
	 * @param $plural_label string
	 *
	 * @return void
	 */
	public function build_cats( $singular_label, $plural_label ) {

		$labels = array(
			'name'              => _x( $singular_label, 'taxonomy general name' ),
			'singular_name'     => _x( $singular_label, 'taxonomy singular name' ),
			'search_items'      => __( 'Search ' . $plural_label ),
			'all_items'         => __( 'All ' . $plural_label ),
			'parent_item'       => __( 'Parent ' . $singular_label ),
			'parent_item_colon' => __( 'Parent ' . $singular_label ),
			'edit_item'         => __( 'Edit ' . $singular_label ),
			'update_item'       => __( 'Update ' . $singular_label ),
			'add_new_item'      => __( 'Add New ' . $singular_label ),
			'new_item_name'     => __( 'New ' . $singular_label ),
			'menu_name'         => __( $plural_label ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_menu'      => true,
			'show_admin_column' => true,
			'query_var'         => true
		);

		$this->cats[$this->post_type] = $args;

	}

	/**
	 * Register the CPT Categories
	 *
	 * @return void
	 */
	public function register_cats() {

		foreach ( $this->cats as $args ) {

			register_taxonomy( $this->post_type . '-category', array( $this->post_type ), $args );

		}

	}

	/**
	 * Get image path
	 *
	 * @param $image_name string
	 *
	 * @return $image string
	 */
	static function get_img( $image_name ) {

		$image = get_bloginfo( 'stylesheet_directory' ) . '/images/' . $image_name;

		return $image;

	}

}