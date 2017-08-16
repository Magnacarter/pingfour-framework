<?php
/**
 * Blog Archive
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */

use Pingfour\theme\includes\Pingfour_Theme;

get_header(); ?>

	<section id="blog" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<header>

					<?php Pingfour_Theme::h1_title(); ?>

				</header>

				<?php get_template_part( 'partials/excerpt-loop' ); ?>

				<section class="blog-pagination">

					<?php Pingfour_Theme::ping_pagination(); ?>

				</section><!-- .blog-pagination -->

			</div><!-- .content -->

			<aside id="sidebar" class="col-md-4">



			</aside><!-- #sidebar -->

		</div><!-- .row -->

	</section><!-- .container -->

<?php get_footer(); ?>
