<?php 
/**
* Template name: General Hangouts
*
*/

get_header(); ?>
<div class="content" id="general-hangouts">
	<div class="container">	
	 		<h1><?php the_title() ?></h1>

	 		<?php if( have_rows('handout') )  :  ?>
                    
                    <section class="handouts">
					
                    <?php while ( have_rows( 'handout' ) ) : the_row(); ?>
                    			<?php if(get_sub_field('heading')) { ?>
									<h2 class="handouts__title"><?php echo get_sub_field('heading') ?>:</h2>
								<?php } ?>

									<?php if ( have_rows( 'downloads' ) ) : ?>

									        <ul class="handouts__list">
									            <?php while ( have_rows( 'downloads' ) ) : the_row(); ?>
									                <li class="handouts__handout">
									                    <?php
									                    $url = get_sub_field( 'file_host' ) === 'external' ? get_sub_field( 'download_file_url' ) : get_sub_field( 'download_file' );
									                    echo sprintf( '<a href="%s" target="_blank">%s</a>', $url, get_sub_field( 'label' ) );
									                    ?>
									                </li>
									            <?php endwhile; ?>
									        </ul>
									  
									<?php endif; ?>


                    <?php endwhile; ?>	

                    </section>
	 		<?php endif; ?>	


	</div>
</div>


<?php 

get_footer()

?>

