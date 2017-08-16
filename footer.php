<?php
/**
 * Footer
 *
 * @package Pingfour\theme
 * @since 1.0.0
 * @author Pingfour
 * @licence GNU-2.0+
 */

$site_title = esc_html( strtoupper( get_bloginfo( 'site_title' ) ) );
$date       = esc_html( date('Y') );

?>

		<footer id="wrapper" class="container">

			<p class="text-center"><?php echo $site_title ?>&copy; <?php echo $date; ?></p>

		</footer>

	<?php wp_footer(); ?>

	</body>

</html>