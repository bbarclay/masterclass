<section class="biz-app">
 <div class="container">
    <div class="row">
      <div class="col-left">
         <div class="inner-text">
             <img src="<?php echo get_template_directory_uri() ?>/images/bizversity-logo.svg" alt="Bizversity" title="Bizversity" />
             <?php if( get_sub_field('heading') ) : ?>
             	<h3><?php echo get_sub_field('heading') ?></h3>
         	 <?php endif ?>
         	 <?php if( get_sub_field('subheading') ) : ?>
             	<p><?php echo get_sub_field('subheading'); ?></p>
         	 <?php endif ?>
              <!-- -Start Button Group -->
              <div class="button-group">
                  <a href="https://bizversity.com/" target="_blank" class="button button-wide button-primary">Learn More</a>
              </div>
              <!-- -End Button Group -->
         </div>
      </div>
      <div class="col-right">
         <img src="<?php echo get_template_directory_uri() ?>/images/biz-ap-min.png" class="biz-app__phone"/>
      </div>
    </div>
 </div>
</section>