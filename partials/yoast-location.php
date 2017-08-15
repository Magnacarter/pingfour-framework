<?php
/**
 * Yoast location
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */

$location_id;
?>

<div class="yoast-location-meta">

	<div class="yoast-wrap">

		<div class="ylm-map">

			<?php
			//map
			if( function_exists( 'wpseo_local_show_map' ) ) {

				$params = array(
					'echo'       => true,
					'id'         => $location_id,
					'height'     => 210,
					'zoom'       => 15,
					'show_route' => false
				);

				wpseo_local_show_map( $params );

				}

			?>

		</div>

		<div class="ylm-address">

			<?php
			//address
			if( function_exists( 'wpseo_local_show_address' ) ) {

				$params = array(
					'echo'         => true,
					'id'           => $location_id,
					'show_state'   => true,
					'show_country' => true,
					'show_phone'   => true,
					'oneline'      => false,
				);

				wpseo_local_show_address( $params );

			}

			?>

			<div class="directions-button">

				<a target="_blank" href="#" class="directions-btn">Get Directions</a>

			</div><!--.directions-button-->

		</div><!--.ylm-address-->

	</div><!--.sb-wrap-->

</div><!--.yoast-location-meta-->
