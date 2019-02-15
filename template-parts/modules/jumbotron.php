<section class="jumbotron" <?php echo get_sub_field( 'image' ) ? 'style="background-image: url(' . get_sub_field( 'image' ) . ');"' : ''; ?>>
	<div class="container">
		<?php if ( get_sub_field( 'title' ) ) : ?>
			<h1 class="jumbotron__title"><?php the_sub_field( 'title' ); ?></h1>
		<?php endif; ?>

		<?php if ( get_sub_field( 'subtitle' ) ) : ?>
			<p class="jumbotron__tagline"><?php the_sub_field( 'subtitle' ); ?></p>
		<?php endif; ?>
	</div>
</section>