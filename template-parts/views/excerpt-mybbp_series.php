<article <?php post_class( 'entry--excerpt' ); ?>>
	<header class="entry__header">
		<h2 class="h3  entry__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</header>

	<div class="entry__content  entry__content--summary">
		<?php the_excerpt(); ?>

        <p><a href="<?php the_permalink(); ?>" class="button  button--alt">Training Videos</a>
	</div>
</article>