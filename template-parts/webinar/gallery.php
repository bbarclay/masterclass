<section class="module module--gallery">
<div class="gallery--images">
<?php if( have_rows('gallery') ): ?>
	<?php while ( have_rows('gallery') ) : the_row(); ?>
		<a data-fancybox="gallery" href="<?php  the_sub_field('image'); ?>">
			<img src="<?php  the_sub_field('image'); ?>" class="webinar-gallery">
		</a>
        
<?php    endwhile;

else :

    // no rows found

endif;

?>
<div class="gallery-clear"></div>
</div>
</section>


