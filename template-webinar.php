<?php 
/**
 * Template Name: Webinar 
 * 
 */

get_header(); ?>

	<main class="main-content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
	  	<?php while ( have_posts() ) : the_post(); ?>
			<?php while ( have_rows( 'webinar_modules' ) ) : the_row(); ?>
				<?php get_template_part( 'template-parts/webinar/' . get_row_layout() ); ?>
			<?php endwhile; ?>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>