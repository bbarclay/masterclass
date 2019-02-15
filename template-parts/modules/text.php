<section class="module  module--text">
	<div class="container">
		<?php if ( get_sub_field( 'title' ) || get_sub_field( 'subtitle' ) ) : ?>
			<header class="module__header">
				<?php if ( get_sub_field( 'title' ) ) : ?>
					<h1 class="module__title">
						<?php the_sub_field( 'title' ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( get_sub_field( 'subtitle' ) ) : ?>
					<p class="module__subtitle"><?php the_sub_field( 'subtitle' ); ?></p>
				<?php endif; ?>
			</header>
		<?php endif; ?>

		<?php if ( get_sub_field( 'text' ) ) : ?>
			<div class="module__content">
				<?php the_sub_field( 'text' ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>