<article class="blueprint  blueprint--summary">
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'blueprint__thumbnail' ) ); ?>
		</a>
	<?php endif; ?>

	<header class="blueprint__header">
		<h2 class="blueprint__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</header>

	<section class="blueprint__summary">
		<?php the_excerpt(); ?>
	</section>

	<?php //get_template_part( 'template-parts/blueprint/downloads' ); ?>
</article>