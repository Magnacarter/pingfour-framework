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

	/**
	 * Get h1 title for any template
	 *
	 * @return void
	 */
	public static function h1_title() {

		global $post;

		if( ! is_front_page() ) : ?>

			<div class="h1-title">

				<?php if( is_search() ) :

					$search_term = get_search_query() ?>

					<h1>You Searched For "<?php echo esc_html( $search_term ) ?>"</h1>

				<?php elseif( is_home() ) : ?>

					<h1>Blog</h1>

				<?php elseif( is_category() ) :

					$arch_title = get_the_archive_title( $post->ID ) ?>

					<h1><?php echo esc_html( $arch_title ) ?></h1>

				<?php elseif( is_singular() ) : ?>

					<h1><?php the_title() ?></h1>

				<?php elseif( is_single( 'post' ) ) : ?>

					<h1><?php the_title() ?></h1>

				<?php elseif( is_author() ) :

					$author_name = get_the_author() ?>

					<h1>Posts By <?php echo esc_html( $author_name ) ?></h1>

				<?php elseif( is_post_type_archive( 'testimonial' ) ) : ?>

					<h1>What our clients say</h1>

				<?php elseif( is_post_type_archive() ) : ?>

					<h1><?php the_title() ?></h1>

				<?php elseif( is_archive() ) : ?>

					<h1>Archives</h1>

				<?php elseif( is_category() ) :

					$cat_name = get_cat_name( $post->ID ) ?>

					<h1><?php echo esc_html( $cat_name ) ?></h1>

				<?php elseif( is_404() ) : ?>

					<h1 style="text-align: center; padding: 0 45px;">Oops! We can’t seem to find the page you’re looking for. <span>(Error code: 404)</span></h1>

				<?php else : ?>

					<h1><?php echo get_the_title( $post->ID ) ?></h1>

				<?php endif ?>

			</div>

		<?php endif;

	}

	/**
	 * Add pagination to blog archive templates
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function ping_pagination() {

		if( is_singular() )
			return;

		global $wp_query;

		// Stop execution if there's only 1 page
		if( $wp_query->max_num_pages <= 1 )
			return;

		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );

		// Add current page to the array
		if ( $paged >= 1 )
			$links[] = $paged;

		// Add the pages around the current page to the array
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="blog-navigation"><span>PAGE</span><ul>';

		// Link to first page, plus ellipses if necessary
		if ( ! in_array( 1, $links ) ) {

			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		// Link to current page, plus 2 pages in either direction if necessary
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		// Link to last page, plus ellipses if necessary
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li class="last-nav" %s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		echo '</ul></div>';

	}

	/**
	 * Show random testimonies from clients
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function rand_testimony() {

		global $wpdb;

		//get a random testimonial
		$testimonials = "
			SELECT *
			FROM $wpdb->posts wposts, $wpdb->postmeta metadate, $wpdb->postmeta metatime
			WHERE (wposts.ID = metadate.post_id AND wposts.ID = metatime.post_id)
			AND wposts.post_type = 'testimonial'
			AND wposts.post_status = 'publish'
			ORDER BY RAND() 
			LIMIT 1
		";

		$testimony = $wpdb->get_results( $testimonials, OBJECT );

		if( $testimony ) :

			global $post;

			foreach ( $testimony as $post ) :

				setup_postdata( $post ) ?>

				<blockquote>

					<?php

					$text = get_the_content();

					$q = substr( $text, 0, 180) ?>

					<q><p><?php echo esc_html( $q ) ?><?php echo ( strlen( $text ) > 180 ) ? '...' : '' ?></p></q>

					<footer>–<?php the_title() ?></footer>

				</blockquote>

			<?php endforeach;

		endif; wp_reset_postdata();

	}

}