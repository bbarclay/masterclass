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
           <small class="video_note"><center><strong>NOTE:</strong> If you log in early, and the video stream doesn't start automatically, please try refreshing this page so you can get the live stream.</center></small>
           <div id="welcomeDiv" class="video-inner" style="display:none;">
           <?php else: ?> 
           <div id="welcomeDiv" class="video-inner">
           <?php endif; ?>
              <?php echo get_sub_field('content') ?>
           </div>
        </div>

   </div>
</section>
<style>
.video_note{color:#FFF; display:none; text-align:center;}
</style>
<script>
if (window.location.href.indexOf("#video") != -1) {
jQuery(".video-inner").show();
jQuery(".input-inner").hide();
jQuery(".video_note").show();
}
</script>





