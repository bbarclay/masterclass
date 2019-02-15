<?php
				

	if( get_sub_field('type') == 'summit'  || get_sub_field('type') == 'webinar'  ) {

		if( have_rows('details_2') ) {

					while ( have_rows('details_2') ) { the_row();  ?>	
			       		<div class="event-information">
		                    <p class="event-date"><strong><?php echo get_sub_field('date') ?></strong> - 
                    			<?php if( get_sub_field('link')) { ?>
                    				<a href="<?php echo get_sub_field('link') ?>"><?php echo get_sub_field('event') ?></a>
                    			<?php }
                    			 	  else { ?>
										<?php echo get_sub_field('event') ?>
                    			<?php } ?>
		                    </p>

		                    		<?php if( have_rows('calendar_event') ) { 

		                    			while ( have_rows('calendar_event') ) { the_row();  ?>

									<div class="wrap-event">
										<div class="event-info">
											<div id="event-2" title="Add to Calendar" class="addeventatc event2">Add to Calendar
												<span class="start"><?php echo get_sub_field('start_date') ?></span>
												<span class="end"><?php echo get_sub_field('end_date') ?></span>
												<span class="timezone"><?php echo get_sub_field('timezone') ?></span>
												<span class="title"><?php echo get_sub_field('title') ?></span>
												<span class="description"><?php echo get_sub_field('description') ?></span>
												<span class="location"><?php echo get_sub_field('location') ?></span>
												<span class="organizer">Business Blueprint</span>
												<span class="organizer_email">support@businessblueprint.com</span>
												<span class="all_day_event">false</span>
												<span class="date_format">MM/DD/YYYY</span>
												<span class="client">aONhfvcCGzTneJMiQmkq29248</span>
									  		</div>
										</div>
									</div>

									<?php } 

									}

									?>

						</div>			
			       <?php 


			       } //details 2

			}//if details 2
   
 }
 else {
  $type =get_sub_field('type');
   echo '<div class="event-conference">';
    	if( have_rows('details') ) {


			while ( have_rows('details') ) : the_row();
	?>
	       		
                    <p class="event-date"><strong><?php echo get_sub_field('date') ?></strong> - 
            			<?php if( get_sub_field('link')) { ?>
            				<a href="<?php echo get_sub_field('link') ?>"><?php echo get_sub_field('event') ?></a>
            			<?php }
            			 	  else { ?>
								<?php echo get_sub_field('event') ?>
            			<?php } ?>
                    </p>
				

	<?php
			endwhile;
		}

		 if( have_rows('calendar_event') ) {

		 	echo '<div class="wrap-event">';

			while ( have_rows('calendar_event') ) : the_row();
	?>
			
			
				<div class="event-info">
				    <?php if($type == 'conference') { ?>
				    <p class="member"><?php echo get_sub_field('membership')  ?></p>
				    <?php } ?>
					<div title="Add to Calendar" class="addeventatc event2">Add to Calendar
						<span class="start"><?php echo get_sub_field('start_date') ?></span>
						<span class="end"><?php echo get_sub_field('end_date') ?></span>
						<span class="timezone"><?php echo get_sub_field('timezone') ?></span>
						<span class="title"><?php echo get_sub_field('title') ?></span>
						<span class="description"><?php echo get_sub_field('description') ?></span>
						<span class="location"><?php echo get_sub_field('location') ?></span>
						<span class="organizer">Business Blueprint</span>
						<span class="organizer_email">support@businessblueprint.com</span>
						<span class="all_day_event">false</span>
						<span class="date_format">MM/DD/YYYY</span>
						<span class="client">aONhfvcCGzTneJMiQmkq29248</span>
			  		</div>
				</div>
			

	<?php
			endwhile;

			echo '</div>';
		}

	echo '</div>';	
 
 }