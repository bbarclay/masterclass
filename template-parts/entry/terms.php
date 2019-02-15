<?php if ( has_category() || has_tag() ) : ?>
	<footer class="entry__footer">
		<?php if( has_category() ) : ?>
			<div class="terms-list terms-list--categories">
				<?php echo get_the_category_list( ', ' ); ?>
			</div>
		<?php endif; ?>

		<?php if( has_tag() ) : ?>
			<div class="terms-list  terms-list--tags">
				<?php echo get_the_tag_list( '', ', ', '' ); ?>
			</div>
		<?php endif; ?>
	</footer>
<?php endif; ?>