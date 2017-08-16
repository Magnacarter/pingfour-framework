<?php
/**
 * Archive template
 *
 * @package Pingfour\theme
 * @since 1.0.0
 * @author Pingfour
 * @licence GNU-2.0+
 */

use Pingfour\theme\includes\Pingfour_Theme;

get_header(); ?>

	<section id="blog" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<div class="h1-title">

					<?php Pingfour_Theme::h1_title(); ?>

				</div>

				<div class="inner-content">

					<?php get_template_part( 'partials/excerpt-loop' ); ?>

				</div><!-- .inner-content -->

				<div class="blog-pagination">

					<?php Pingfour_Theme::ping_pagination(); ?>

				</div><!-- .blog-pagination -->

			</div><!-- .content -->

			<aside id="sidebar" class="col-md-4">



			</aside><!-- #sidebar -->

		</div><!-- .row -->

	</section><!-- .container -->

<?php get_footer(); ?>