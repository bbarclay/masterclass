<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php get_template_part( 'template-parts/content/header' ); ?>

		<div class="container">
			<?php if ( have_posts() ) : ?>
				<div class="grid  grid--2-columns">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="grid__column">
							<?php get_template_part( 'template-parts/views/excerpt', get_post_type() ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else: ?>
				<p>Sorry, nothing found that matched your criteria.</p>
			<?php endif; ?>

			<?php cascade_paginate_links(); ?>
		</div>
	</main>

<?php get_footer(); ?>