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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
