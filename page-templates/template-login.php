<?php
/**
 * Template Name: Redken Login
 */

get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">

				<div class="container">
					<div class="entry__content  clearfix" itemprop="text">
						<?php the_content(); ?>
					</div>

					<?php


					if ( ! is_user_logged_in() ) { // Display WordPress login form:
					    $args = array(
					        'redirect' => home_url() . '/facebook-ads-express', 
					        'form_id' => 'loginform-custom',
					        'remember' => true
					    );
					    wp_login_form( $args );
					} else { // If logged in:
					    wp_loginout( home_url() ); // Display "Log Out" link.
					}
					?>
				</div>

			</article>

		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>