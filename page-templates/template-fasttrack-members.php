<?php
/**
 * Template Name: Fasttrack Members Photos
 */

get_header(); ?>
<style>
	.bb-members .image {
    		height: 250px; 
	}
	 .bg-white {
	    background: #f5f3f3;
	    padding: 0.5em;
	}
</style>
<main id="content" class="content" tabindex="-1">
		<div class="container">
			  <div class="grid  grid--boxes profiling">
					<?php 

						$args = array(
		                       'post_type' => 'bb_members',
		                       'post_status' => 'publish',
		                       'posts_per_page' => -1,
		                       'meta_key'		=> 'membership_level',
							   'meta_value'	=> 'Fasttrack',
							   'order' => 'ASC',
							   'orderby'    => 'date'


						);

						$query = new WP_Query( $args );

							if ( $query->have_posts()) : 
								 while ( $query->have_posts()) :  $query->the_post(); 


									/* grab the url for the full size featured image */
        						    $featured_img_url = get_the_post_thumbnail_url(get_the_ID());

     
									$color = get_field('consultant'); 
								?>

									<div class="grid__column">
										<div class="member bb-members">
												<div class="image bg-<?php echo $color; ?>">

													<?php if(has_post_thumbnail()) { ?>
														<img src="<?php echo esc_url($featured_img_url) ?>"  />
													<?php } ?>
												</div>
												<div class="information">
												    <span class="name"><?php the_title(); ?></span>	
												   		
												</div>
										</div>
									</div>

						<?php 

								endwhile; 
						  endif; 

						  wp_reset_postdata();
						?>

				</div>
				<div class="printable-style">
					<a href="javascript:window.print()">Download PDF</a>
				</div>

		</div>
	</main>

<?php get_footer(); ?>