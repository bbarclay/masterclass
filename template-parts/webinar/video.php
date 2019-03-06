<section class="module video">
   <div class="container">
        <h1><?php echo get_sub_field('heading') ?></h1>

        <div class="video-wrap">
        	<?php  if ( get_sub_field( 'form_fill' ) ) : ?>
        	<div id="hideForm" class="input-inner">
            	<p style="color:#FFF; text-align:center;">Enter your unique username and password to view this Business Blueprint LIVE session.</p>
            	<?php echo get_sub_field('form_fill') ?>
            </div>
            <?php endif; ?>
          
            
           <?php if ( get_sub_field( 'form_fill' ) ) : ?>
           <div id="welcomeDiv" class="video-inner" style="display:none;">
           <?php else: ?>  
           <div id="welcomeDiv" class="video-inner">
           <?php endif; ?>
              <?php echo get_sub_field('content') ?>
           </div>
        </div>

   </div>
</section>
<script>
if (window.location.href.indexOf("#video" && "?email") != -1) {
jQuery(".video-inner").show();
jQuery(".input-inner").hide();
}
</script>





