<section class="call-to-action  call-to-action--<?php the_sub_field( 'style' ); ?>"  <?php echo ( 'image' === get_sub_field( 'style' ) && get_sub_field( 'image' ) ) ? 'style="background-image: url(' . get_sub_field( 'image' ) . ');"' : ''; ?>>
	<div class="container">
		<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="call-to-action__title"><?php the_sub_field( 'title' ); ?></h2>
		<?php endif; ?>

		<?php if ( get_sub_field( 'button_link' ) && get_sub_field( 'button_label' ) ) : ?>
			<a href="<?php the_sub_field( 'button_link' ); ?>" class="call-to-action__button  button  button--wide"><?php the_sub_field( 'button_label' ); ?></a>
		<?php endif; ?>
	</div>
</section>