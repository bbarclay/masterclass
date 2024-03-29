<article class="video  video--excerpt">
	<?php if ( cascade_get_video() ) : ?>
		<section class="video__video">
			<?php cascade_the_video(); ?>
		</section>
	<?php endif; ?>

	<header class="video__header">
		<h2 class="video__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<?php echo get_the_term_list( get_the_ID(), 'mybbp_video_presenter', '<div class="video__presenter">', ', ', '</div>' ); ?>
	</header>

	<section class="video__summary">
		<?php the_excerpt(); ?>
	</section>

	<?php get_template_part( 'template-parts/entry/downloads' ); ?>
</article>