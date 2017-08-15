<?php
/**
 * Standard page partial
 *
 * @package Pingfour/theme/partials
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */

use Pingfour\theme\includes\Pingfour_Theme;

?>

<section id="standard-page" class="wrap">

	<div class="container">

		<div class="inner-wrapper row">

			<div class="content col-md-8">

				<header>

					<?php Pingfour_Theme::h1_title() ?>

				</header>

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post() ?>

						<?php if( has_post_thumbnail() ) : ?>

							<div class="featured-image col-sm-4">

								<?php the_post_thumbnail() ?>

							</div><!--.featured-image-->

						<?php endif ?>

						<?php the_content() ?>

					<?php endwhile ?>

				<?php endif ?>

			</div><!--.content-->

		</div><!--.inner-wrapper-->

	</div><!--.container-->

</section>
