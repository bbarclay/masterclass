<?php 
/*
* Template name: Conference
*/
get_header(); ?>
<style>
	.event-information,
	.event-conference {
	    margin-bottom: 30px;
	}
	.wrap-event .addeventatc {
	    margin: 5px auto;
	    background: #00264c;
	    color: #fff !important;
	    border-radius: 5px;
	    background: #00bce4;
	    height: 45px;
	}
	.event-date {
		margin-bottom: 5px;
	}
	p.member {
      margin: 10px 0 0 0;
	}
	.event-info {
		display: inline-block;
	}
</style>
	<main id="content" class="content" tabindex="-1">
		<div class="container">
			<?php

			while ( have_posts() ) : the_post(); 

				the_content();

				if( have_rows('event_details') ):

				  
				    while ( have_rows('event_details') ) : the_row();

						echo '<h1>'. get_sub_field('month') .'</h1>';


						  if( have_rows('Event') ):

				  
				    			while ( have_rows('Event') ) : the_row();
										
									get_template_part( 'template-parts/modules/content/conference'); 
					 						
								endwhile;

						  endif;
				    endwhile;

				endif;

			endwhile;	

			?>

		</div>
	</main>
<!-- AddEvent --><script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<?php get_footer(); ?>