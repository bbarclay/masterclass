    function multistep_form() {

			//jQuery time
			var current_fs, next_fs, previous_fs; //fieldsets
			var left, opacity, scale; //fieldset properties which we will animate
			var animating, input, stop; //flag to prevent quick multi-click glitches


			$(".next").click( function(){

				if(animating) return false;
				animating = true; 

					    stop = false;

				        input = $(this).closest('fieldset').find('.moonray-form-input');
						

						input.each( function( index ) {

							  if( $(this).val().length < 1 ) {

							  	 $(this).addClass('moonray-form-state-error');

							  	 stop = true;
							  }	
							  else {

							  	 $(this).removeClass('moonray-form-state-error');

							  }
						  
						});

			
					   if( stop != true ) {
					
							current_fs = $(this).closest('fieldset');
							next_fs    = $(this).closest('fieldset').next();


								//activate next step on progressbar using the index of next_fs
								$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
								
								//show the next fieldset
								next_fs.show(); 
								//hide the current fieldset with style
								current_fs.animate({opacity: 0}, {
									step: function(now, mx) {
										//as the opacity of current_fs reduces to 0 - stored in "now"
										//1. scale current_fs down to 80%
										scale = 1 - (1 - now) * 0.2;
										//2. bring next_fs from the right(50%)
										left = (now * 50)+"%";
										//3. increase opacity of next_fs to 1 as it moves in
										opacity = 1 - now;
										current_fs.css({
							        'transform': 'scale('+scale+')',
							        'position': 'absolute'
							      });
										next_fs.css({'left': left, 'opacity': opacity});
									}, 
									duration: 800, 
									complete: function(){
										current_fs.hide();
										animating = false;
									}, 
									//this comes from the custom easing plugin
									//easing: 'easeInOutBack'
								});

					    }
					    else {
					    	animating = false;
					    	console.log('animating ' + animating);

					    }
				
					

				
			});

			$(".previous").click(function(){

				if(animating) return false;
				animating = true;
				
				current_fs = $(this).closest('fieldset');
				previous_fs = $(this).closest('fieldset').prev();
				


				//de-activate current step on progressbar
				$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
				
				//show the previous fieldset
				previous_fs.show(); 
				//hide the current fieldset with style
				current_fs.animate({opacity: 0}, {
					step: function(now, mx) {
						//as the opacity of current_fs reduces to 0 - stored in "now"
						//1. scale previous_fs from 80% to 100%
						scale = 0.8 + (1 - now) * 0.2;
						//2. take current_fs to the right(50%) - from 0%
						left = ((1-now) * 50)+"%";
						//3. increase opacity of previous_fs to 1 as it moves in
						opacity = 1 - now;
						current_fs.css({'left': left});
						previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
					}, 
					duration: 400, 
					complete: function(){
						current_fs.hide();
						previous_fs.css({'position' : 'relative'});
						animating = false;
					}, 
					//this comes from the custom easing plugin
					//easing: 'easeInOutBack'
				});
			});

 }
 multistep_form();