<?php
/**
 * Single blog template
 *
 * @package Pingfour\theme
 * @since 1.0.0
 * @author Pingfour
 * @licence GNU-2.0+
 */

get_header(); ?>

	<section id="blog" class="container" itemscope itemtype="https://schema.org/BlogPosting">

		<div class="inner-wrapper row">

			<div class="content col-md-8" itemprop="mainEntityOfPage">
				<?php
				get_template_part( 'partials/excerpt-loop' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :

					comments_template();

				endif; ?>
			</div>

			<aside id="sidebar" class="col-md-4">


			</aside><!-- #sidebar -->

		</div><!-- .row -->

	</section><!-- .container -->

<?php get_footer(); ?>

