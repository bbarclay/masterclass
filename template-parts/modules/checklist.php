<section class="module  module--checklist">
	<div class="container">
		<?php if ( have_rows( 'items' ) ) : ?>
			<ul class="checklist  checklist--2-columns">
				<?php while ( have_rows( 'items' ) ) : the_row(); ?>
					<li><?php the_sub_field( 'text' ); ?></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>