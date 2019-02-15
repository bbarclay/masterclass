<?php
/**
 * Template Name: Modules Template
 */

get_header(); ?>

	<div class="site__middle  site__middle--modules">
		<main id="content" class="content  content--modules" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php while ( have_rows( 'modules' ) ) : the_row(); ?>
					<?php get_template_part( 'template-parts/modules/' . get_row_layout() ); ?>
				<?php endwhile; ?>
			<?php endwhile; ?>
		</main>
	</div>

<?php get_footer(); ?>