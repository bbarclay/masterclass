<?php 

/**
*
* Template Name: Header With Date
*
*/

get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">

		<header class="banner" <?php cascade_the_banner_image(); ?>>
			<div class="container">
				<h1 class="banner__title banner__bg" itemprop="headline">
					<?php the_title(); ?> <br><strong><?php echo get_the_time( 'F Y' ) ?></strong>
				</h1>
				<?php wp_reset_query(); ?>

				<div class="banner__subtitle"></div>
			</div>
		</header>

		<div class="container">
			<div class="entry__content  clearfix" itemprop="text">
				<?php the_content(); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>