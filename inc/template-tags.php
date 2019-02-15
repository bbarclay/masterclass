<?php
/**
 * Custom template tags.
 *
 * @link https://codex.wordpress.org/Template_Tags
 */

if ( ! function_exists( 'cascade_cart_link' ) ) {
	/**
	 * Display the current cart contents, with a link to the WooCommerce cart page.
	 */
	function cascade_cart_link() {
		if( ! class_exists( 'woocommerce' ) ) {
			return;
		}

		$url =  WC()->cart->get_cart_url();
		$total = WC()->cart->get_cart_total();
		$count =WC()->cart->get_cart_contents_count();
		?>

		<a href="<?php echo $url; ?>" id="cart-link" class="cart-link tool tool--cart">
			<span class="tool__label">
				<?php if ( $count  > 0 ) : ?>
					<?php echo $total . ' (' . sprintf( _n( '%d item', '%d items', esc_attr( $count ) ), $count ) . ')'; ?>
				<?php else : ?>
					<?php _e( 'Cart', 'woocommerce' ); ?> is Empty
				<?php endif; ?>
			</span>
		</a>

		<?php
	}
}

if ( ! function_exists( 'cascade_account_link' ) ) {
	/**
	 * Display a link to the WooCommerce account page, with a welcome message if
	 * the user is logged in.
	 */
	function cascade_account_link() {
		if( ! class_exists( 'woocommerce' ) ) {
			return;
		}

		$url = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
		$user = wp_get_current_user();
		$name = $user->display_name ?: $user->user_login;
		?>

		<a href="<?php echo $url; ?>" class="tool tool--account">
			<span class="tool__label">
				<?php if ( is_user_logged_in() ) : ?>
					Welcome, <strong><?php echo $name; ?></strong>
				<?php else : ?>
					Log In
				<?php endif; ?>
			</span>
		</a>

		<?php
	}
}

if ( ! function_exists( 'cascade_paginate_links' ) ) {
	/**
	 * paginate_links with markup and pre-set arguments.
	 */
	function cascade_paginate_links() {
		$args = array(
			'prev_text' => '← Previous',
			'next_text' => 'Next →',
		);
		?>

		<nav class="pagination" role="navigation">
			<?php echo paginate_links( $args ); ?>
		</nav>

		<?php
	}
}

function cascade_get_video() {
	switch ( get_field( 'video_host' ) ) {
		case 'oembed':
			return get_field( 'video_oembed' );
			break;
		case 'external':
		case 'media':
			if ( get_field( 'video_url' ) ) {
				return wp_video_shortcode( array( 'src' => get_field( 'video_url' ), 'width' => 960 ) );
			}
			break;
	}
}

function cascade_the_video() {
	echo cascade_get_video();
}

function cascade_the_term_list( $taxonomy, $parents = true ) {
	$terms = get_the_terms( get_the_ID(), $taxonomy );

	if ( ! is_wp_error( $terms ) && $terms ) {
		$taxonomy_object = get_taxonomy( $taxonomy );

		foreach ( $terms as $term ) {
			if ( $term->parent > 0 || $parents )
			echo sprintf( '<a href="%s" class="tag">%s: %s</a>', get_term_link( $term ), $taxonomy_object->labels->singular_name, $term->name );
		}
	}
}

function cascade_the_video_topic_list() {
	cascade_the_term_list( 'mybbp_video_topic' );
}

function cascade_the_webinar_category_list() {
	cascade_the_term_list( 'mybbp_webinar_cat' );
}

function cascade_the_blueprint_topic_list() {
	cascade_the_term_list( 'mybbp_blueprint_topic', false );
}

function cascade_the_conference_list() {
	$videos = new WP_Query( array(
		'post_type'       => get_post_type( get_queried_object_id() ),
		'connected_type'  => 'mybbp_video_to_conference',
		'connected_items' => get_queried_object(),
	) );

	if ( $videos->have_posts() ) {
		while ( $videos->have_posts() ) : $videos->the_post();
			echo sprintf( '<a class="tag" href="%s">Conference: %s</a>', get_the_permalink(), get_the_title() . ' ' . get_the_time( 'F Y', $post ) );
		endwhile;
	}

	wp_reset_query();
}

function cascade_the_series_list() {
	$videos = new WP_Query( array(
		'post_type'       => get_post_type( get_queried_object_id() ),
		'connected_type'  => 'mybbp_video_to_series',
		'connected_items' => get_queried_object(),
	) );

	if ( $videos->have_posts() ) {
		while ( $videos->have_posts() ) : $videos->the_post();
			echo sprintf( '<a class="tag  tag--primary" href="%s">Series: %s</a>', get_the_permalink(), get_the_title() );
		endwhile;
	}

	wp_reset_query();
}

function cascade_get_adjacent_video_id( $previous = false ) {
	global $wpdb, $post;

	$series_query =
	"SELECT
		p2p_to
	FROM
		$wpdb->p2p
	WHERE
		p2p_from=$post->ID
	LIMIT 1";

	$series = $wpdb->get_var( $series_query );

	if ( ! $series ) {
		return;
	}

	$orderby = $previous ? 'DESC' : 'ASC';
	$direction = $previous ? '<' : '>';

	$adjacent_query =
	"SELECT
		p2p.p2p_from
	FROM
		$wpdb->p2p p2p
	LEFT JOIN
		$wpdb->posts posts ON
			posts.ID=p2p.p2p_from
	WHERE
		posts.menu_order $direction $post->menu_order AND
		p2p.p2p_type = 'mybbp_video_to_series' AND
		p2p.p2p_to = $series
	ORDER BY
		posts.menu_order $orderby
	LIMIT 1";

	$next_video = $wpdb->get_var( $adjacent_query );

	return $next_video;
}

function cascade_get_next_video_url() {
	$id = cascade_get_adjacent_video_id();

	return $id ? get_permalink( $id ) : false;
}

function cascade_get_previous_video_url() {
	$id = cascade_get_adjacent_video_id( true );

	return $id ? get_permalink( $id ) : false;
}

function cascade_the_banner_title() {
	$object = is_tax() ? get_queried_object() : get_queried_object_id();
	$title = is_tax() ? single_term_title( false, false ) : get_the_title();

	if ( is_singular( 'mybbp_conference' ) ) {
		$title .= '<br><strong>' . get_the_time( 'F Y' ) . '</strong>';
	}

	$banner_title = array();

	if ( get_field( 'banner_title_1', $object ) ) {
		$banner_title[] = get_field( 'banner_title_1', $object );
	}

	if ( get_field( 'banner_title_2', $object ) ) {
		$banner_title[] =  '<strong>' . get_field( 'banner_title_2', $object ) . '</strong>';
	}

	$banner_title = implode( '<br>', $banner_title );

	$title = $banner_title ?: $title;

	echo $title;
}

function cascade_the_banner_image() {
	$object = is_tax() ? get_queried_object() : get_queried_object_id();
	$image = get_field( 'banner_image', $object );

	if ( $image ) {
		echo 'style="background-image:url(' . wp_get_attachment_url( $image ) . ');"';
	}
}