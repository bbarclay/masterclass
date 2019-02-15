
				<footer class="footer">
					<div class="container">
						<div class="grid">
							<div class="grid__column  grid__column--s-8  grid__column--m-4">
								presented by
								<img src="<?php echo get_template_directory_uri(); ?>/images/bb-logo-navy.svg" class="footer__logo" alt="Business Blueprint">
							</div>

							<div class="grid__column  grid__column--s-12  grid__column--m-8  footer__right">
								<?php if ( function_exists( 'magicdust_social_menu' ) ) : magicdust_social_menu(); endif; ?>
								
								<div class="footer__contact">Email: <span><img src="<?php echo get_template_directory_uri() ?>/images/email.svg" width="283" /></span></div>
								<div class="footer__contact">Within Australia: <span><a href="tel:1300782734">1300 782 734</a></span></div>
					
 
							</div>
						</div>
						<div class="footer__bottom">
							<small>Copyright © <span itemprop="copyrightYear"><?php echo date( 'Y' ); ?></span> <span itemprop="copyrightHolder"><?php echo get_theme_mod( 'copyright', get_bloginfo( 'name' ) ); ?></span>
							 <ul class="list-unstyled">
				                <li><a href="https://businessblueprint.com.au/about-business-blueprint/" target="_blank">About Us</a></li>
				                <li><a href="https://businessblueprint.com.au/why-business-blueprint/" target="_blank">Why Us</a></li>
				                <li><a href="https://businessblueprint.com.au/success-stories/" target="_blank">Success Stories</a></li>
				                <li><a href="https://businessblueprint.com.au/contact-us/" target="_blank">Contact Us</a></li>
				              </ul>
							</small>
						</div>
						
					</div>
				</footer>

		</div> <!-- /.site -->




		<?php wp_footer(); ?>
	</body>
</html>