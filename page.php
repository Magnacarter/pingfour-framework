<?php
/**
 * Page template
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */
get_header() ?>

	<?php if( is_page( 'site-map' ) ) : ?>

		<?php get_template_part( 'partials/sitemap' ) ?>

	<?php else : ?>

		<?php get_template_part( 'partials/standard-page' ) ?>

	<?php endif ?>

<?php get_footer() ?>