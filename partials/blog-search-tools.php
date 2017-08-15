<?php
/**
 * Blog Search Tools
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */
?>

<div class="search-blog-wrap">

	<div class="blog-search-bar">

		<form method="get" id="searchform" action="<?php bloginfo('url') ?>">

			<div>

				<input class="search-input" type="text" value="<?php the_search_query() ?>" name="s" id="s" placeholder="Search the blog">

				<input class="search-button" type="submit" id="searchsubmit" value="">

			</div>

		</form>

	</div><!--.blog-search-bar-->

</div><!--.search-blog-wrap-->