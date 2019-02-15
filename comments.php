<?php if ( post_password_required() ) : return; endif; ?>

<?php if ( comments_open() || get_comments_number() ) : ?>
	<section id="comments" class="comments">
		<?php if ( have_comments() ) : ?>
			<header class="comments__header">
				<h1 class="comments__title  h3">
					<?php printf( _n( 'One reply to “%2$s”', '%1$s replies to “%2$s”', get_comments_number() ), get_comments_number(), get_the_title() ); ?>
				</h1>
			</header>

			<ol class="comment__list small">
				<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 50,
				) );
				?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="pagination">
					<?php paginate_comments_links( array('prev_text' => '← Previous', 'next_text' => 'Next →' ) ); ?>
				</nav>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p>Comments are closed.</p>
		<?php endif; ?>

		<?php comment_form(); ?>
	</section>
<?php endif; ?>