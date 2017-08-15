<?php
/**
 * Excerpt loop
 *
 * @package Pingfour/theme/
 * @since 1.0.0
 * @author Adam Carter
 * @licence GNU-2.0+
 */
?>

<?php if ( have_posts() ) :

	$i = 0; ?>

	<?php while ( have_posts() ) : the_post(); $i++;

		global $post;
		$author_id     = get_the_author_meta( 'ID' );
		$author        = get_author_posts_url( $author_id );
		$author_name   = get_the_author_meta( 'display_name' );
		$category      = get_the_category_list( ', ', $post->ID );
		$category_name = $category[0]->name;
		$category_id   = $category[0]->term_id;
		$link          = get_category_link( $category_id ); ?>

		<div class="clearfix"></div>

		<article class="<?php echo( is_single() ) ? 'post-holder' : 'post-excerpt' ?>">

			<div class="blog-post">

				<div class="<?php echo ( is_single() ) ? 'post-title' : 'excerpt-title' ?>">

					<?php if( ! is_single() ) : ?>

						<h2 itemprop="name headline"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

					<?php else : ?>

						<h2 itemprop="name headline"><?php the_title() ?></h2>

					<?php endif ?>

				</div><!--.blog-title-->

			</div><!--.blog-post-->

		</article>

		<?php if( ! is_single() ) : ?>

			<?php if( has_post_thumbnail() ) : ?>

				<div class="image-holder post-featured-image col-md-4 no-pad-left">

					<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

						<meta itemprop="url" content="<?php the_post_thumbnail_url() ?>">

						<meta itemprop="width" content="120">

						<meta itemprop="height" content="120">

						<img src="<?php the_post_thumbnail_url() ?>" class="img-responsive" />

					</div>

				</div><!--.image-holder-->

				<div class="post-meta-wrap col-md-8 no-pad-left">

					<div class="post-meta" itemprop="author">

						<span itemscope itemtype="http://schema.org/Person">

							<meta itemprop="datePublished" content="<?php the_time( c ) ?>">

							<time class="month" datetime="<?php the_time('F j, Y')?>"><?php the_time('F j, Y') ?></time>

							<?php echo $category; ?>

						</span>

					</div><!--.post-meta-->

				</div><!--.post-meta-wrap-->

			<?php else : ?>

				<div class="post-meta-wrap col-sm-12">

					<div class="post-meta" itemprop="author">

						<span itemscope itemtype="http://schema.org/Person">

							<meta itemprop="datePublished" content="<?php the_time( c ) ?>">

							<time class="month" datetime="<?php the_time('F j, Y')?>"><?php the_time('F j, Y') ?></time>

							<?php echo $category; ?>

						</span>

					</div><!--.post-meta-->

				</div><!--.post-meta-wrap-->

			<?php endif ?>

			<div class="post-wrap <?php echo ( has_post_thumbnail() ) ? 'col-md-8 no-pad-left-mobile' : 'col-sm-12 no-pad-left' ?>">

				<div class="blog-excerpt" itemprop="articleBody">

					<p><?php the_excerpt() ?></p>

					<div class="blog-read-more-button">

						<a href="<?php the_permalink() ?>" class="blog-read-more-btn">Read Full Article</a>

					</div>

				</div>

			</div><!--.post-wrap-->

		<?php endif ?>

		<?php if( is_single() ) : ?>

			<div class="post-wrap">

				<div class="blog-content" itemprop="articleBody">

					<div class="post-meta" itemprop="author">

						<span itemscope itemtype="http://schema.org/Person">

							<meta itemprop="datePublished" content="<?php the_time( c ) ?>">

							<time class="month" datetime="<?php the_time('F j, Y')?>"><?php the_time('F j, Y') ?></time>

							&nbsp;By:

							<span itemprop="name"><?php echo $author_name; ?></span>

						</span>

					</div><!--.post-meta-->

					<?php if( has_post_thumbnail() ) : ?>

						<div class="image-holder featured-image col-sm-4 no-pad-left-mobile">

							<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

								<meta itemprop="url" content="<?php the_post_thumbnail_url() ?>">

								<meta itemprop="width" content="120">

								<meta itemprop="height" content="120">

								<img src="<?php the_post_thumbnail_url() ?>" class="img-responsive" />

							</div>

						</div>

					<?php endif ?>

					<?php the_content() ?>

				</div><!--.blog-content-->

			</div><!--.post-wrap-->

			<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

				<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

					<meta itemprop="url" content="<?php echo $home ?>/logo.jpg">

					<meta itemprop="width" content="600">

					<meta itemprop="height" content="60">

				</div>

				<meta itemprop="name" content="<?php bloginfo( 'name' ) ?>">

			</div>

		<?php endif ?>

	<?php endwhile ?>

<?php endif ?>
