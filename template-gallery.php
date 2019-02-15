<?php 
/*
* Template name: Member Gallery
*/
get_header(); ?>

	<main id="content" class="content" tabindex="-1">
		<div class="container">
			<?php

			
				if( have_rows('member_profiles') ):

				  
				    while ( have_rows('member_profiles') ) : the_row();

				        if( get_row_layout() == 'profile' ): ?>

				        		<div class="grid  grid--boxes profiling">

														<?php	if( have_rows('profile') ):
												
													    		while ( have_rows('profile') ) : the_row(); 

													    			$image = get_sub_field('image');
													    			$color = get_sub_field('consultant');

													    			
													    ?>

																
																	<div class="grid__column">
																		<div class="member">
																				<div class="image bg-<?php echo $color; ?>">
																					<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
																				</div>
																				<div class="information">
																				    <span class="name"><?php echo get_sub_field('name'); ?></span>	
																				   		
																				</div>
																		</div>
																	</div>
														<?php 
																	
																endwhile;

														else :
														    // no rows found
														endif;  ?>

													
									
								</div>
									<div class="printable-style">
										<a href="javascript:window.print()">Download PDF</a>
									</div>
				    <?php    endif;

				    endwhile;

				else :

				    // no layouts found

				endif;

			?>

		</div>
	</main>

<?php get_footer(); ?>