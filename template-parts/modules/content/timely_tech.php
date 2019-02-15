
				<div class="video-list">

				     <div class="player">
 						<!-- <div id="icon-video"><span class="menu">More Videos</span> <span class="icon genericon genericon-next"></span></div> -->	

				     <?php

				     	if( have_rows('videos') ) :

				     		$count = 0;

				     		while ( have_rows('videos') ) : the_row();

				     		$count++;

								$title = get_sub_field('title');
								$description = get_sub_field('description');
								$date = get_sub_field('date');
				

									// get iframe HTML
									$iframe = get_sub_field('video');


									// use preg_match to find iframe src
									preg_match('/src="(.+?)"/', $iframe, $matches);
									$src = $matches[1];


									// add extra params to iframe src
									$params = array(
									    'controls'    => 0,
									    'hd'        => 1,
									    //'autohide'    => 1
									);

									$new_src = add_query_arg($params, $src);

									$iframe = str_replace($src, $new_src, $iframe);


									// add extra attributes to iframe html
									$attributes = 'frameborder="0"';

									$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


				     		?>
						     	<div class="item item-<?php echo $count; ?> <?php echo ($count == 1) ? 'active' : '';?>">
								         <div class="video">
								           <?php echo $iframe; ?>
								     	 </div>
								     	 <div class="details">
								     	 	 <?php if($title) :?>
								     	 	  	<h2 class="title"><?php echo $title?></h2>
								     	 	<?php endif; 

								     	 	     if($date) { ?>
								     	 	      <span class="date"><span class="genericon genericon-month"></span><?php echo $date ?></span>
								     	 	  <?php } ?>
								     	 	  <div class="description">
								     	 	  	<?php  if($description) { ?>
								     	 	  		<?php echo $description; ?>
								     	 	  	<?php } ?>
								     	 	  	    <div class="extra">
								     	 	  	    	<?php 

														 	if( have_rows('downloads') ) :

														 		echo ' <ul class="btn-download">';

														 		while( have_rows('downloads') ) : the_row(); 


														 		         if( get_sub_field('download_link') ) :


																	 		 if( get_sub_field('type') == 'video' ) {
																	 		 	 $color = 'navy';
																	 		 }
																	 		 else if( get_sub_field('type') == 'audio' ) {
			 																	 $color = 'navy';
																	 		 }
																	 		 else if( get_sub_field('type') == 'slide' ) {
			 																	 $color = 'orange';
																	 		 }
														        ?>

										     	 	  	 			        <li><a href="<?php echo get_sub_field('download_link') ?>" class="btn-<?php echo $color; ?> " target="_blank" download><span class="text">Download <?php echo get_sub_field('type'); ?></span></a></li>

											     	 	  	 <?php
											     	 	  	             endif;
														 		endwhile;

														 		echo '</ul>';
														 	 endif;	
														  ?>
								     	 	  	    </div>
								     	 	  </div>
								     	 	 

								     	</div>
								</div> 


 							<?php
				     		endwhile;

				     	else:
				     	
				     		//No rows found

				     	endif;	
						?>
		
					 </div>	
					 <aside class="list">
						 <?php 
						 	if( have_rows('videos') ) :
						 		$count = 0;

						 		while( have_rows('videos') ) : the_row(); 

						 			$c++;
						 		?>

								 	 <div class="item <?php echo ($c == 1) ? 'active' : ''; ?>" control="<?php echo $c; ?>">
								 	 	 <div class="image">
								 	 	     <img src="<?php echo get_sub_field('thumbnail'); ?>" width="100%" />
								 	 	      <p class="title"><?php echo get_sub_field('title') ?> <br> <span class="date"><?php echo get_sub_field('date') ?></span></p>

								 	 	 </div>
								 	 	 <div class="info">
								 	 	   
								 	 	    

								 	 	    	 <?php 

												 	if( have_rows('lists') ) :

												 		echo ' <p class="bullets">';

												 		while( have_rows('lists') ) : the_row(); 

												        ?>
									     	 	  	        <span><?php echo get_sub_field('item') ?></span> 

									     	 	  <?php
												 		endwhile;

												 		echo '</p>';
												 	 endif;	
												  ?>
								 	 	 </div>
								 	 	 
								 	 </div>
						 	<?php
						 		endwhile;
						 	endif;	
						 ?>
					 </aside>
					 
				</div>
				<script>
					(function($){
						$('#icon-video').on('click', function(){

							if( $(this).hasClass('open') ) {

								$('aside.list').removeClass('move');
								$('.flex-mod .video-list .player').removeClass('goLeft');

								$(this).find('.menu').removeClass('hide');
								$(this).find('.icon').addClass('genericon-next').removeClass('genericon-close');
								$(this).removeClass('open');
							}
							else {

								$('aside.list').addClass('move');
								$('.flex-mod .video-list .player').addClass('goLeft');

								$(this).find('.menu').addClass('hide');
								$(this).find('.icon').removeClass('genericon-next').addClass('genericon-close');
								$(this).addClass('open');
							}


						});

					})(jQuery);
				</script>