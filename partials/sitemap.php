<?php
/**
 * Sitemap
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */
?>

<section id="sitemap" class="container">

	<div class="inner-wrapper row">

		<div class="content col-md-8">

			<div class="site-map-content">

				<ul>

				<?php

					// Add pages you'd like to exclude in the exclude here
					wp_list_pages(

						array(
							'exclude' => '',
							'title_li' => '',
						)

					);

				?>

				</ul>

			</div>

		</div><!--.content-->

		<aside id="sidebar" class="col-md-4">

			<?php if ( is_active_sidebar( ' generic_sidebar' ) ) {

				dynamic_sidebar( ' generic_sidebar' );

			} else {

				echo 'Please insert a sidebar.';

			} ?>

		</aside><!--#sidebar-->

	</div><!--.row-->

</section><!--.container-->