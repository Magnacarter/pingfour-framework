<?php
/**
 * Author template
 *
 * @package Pingfour\theme
 * @since 1.0.0
 * @author Pingfour
 * @licence GNU-2.0+
 */
get_header() ?>

	<section id="author" class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<?php the_author_meta( 'description' ) ?>

				<?php get_template_part( 'partials/excerpt-loop' ) ?>

			</div><!--.content-->

			<aside id="sidebar" class="col-md-4">


			</aside><!--#sidebar-->

		</div><!--row-->

	</section><!--.container-->

<?php get_footer() ?>