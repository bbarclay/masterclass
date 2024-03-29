<?php
/**
 * Template Name: Video Topics Template
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
						$terms = get_terms( array(
							'taxonomy'   => 'mybbp_video_topic',
							'hide_empty' => false,
							'parent'     => 0,
						) );

						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
							?>

							<div class="grid  grid--boxes">
								<?php foreach ( $terms as $term ) : ?>
									<div class="grid__column">
										<div class="box">
											<a href="<?php echo get_term_link($term); ?>" class="box__link">
												<div class="box__label">
													<?php echo $term->name; ?>
												</div>
											</a>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

							<?php
						endif;
						?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>