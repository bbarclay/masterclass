<?php
/**
 * Template Name: Child Pages Template
 */

get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
				<header class="banner" <?php cascade_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title(); ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>

				<div class="container">
					<div class="entry__content  clearfix" itemprop="text">
						<?php the_content(); ?>

						<?php
						$children = new WP_Query(array(
							'posts_per_page' => -1,
							'post_type'      => 'page',
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
							'post_parent'    => get_queried_object_id(),
						));

						if ( $children->have_posts() ) : ?>
							<div class="grid  grid--boxes">
								<?php while ( $children->have_posts() ) : $children->the_post(); ?>
									<div class="grid__column">
										<div class="box">
											<a href="<?php the_permalink(); ?>" class="box__link">
												<div class="box__label">
													<?php the_title(); ?>
												</div>
											</a>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>