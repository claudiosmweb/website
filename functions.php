<?php
/**
 * Website logo.
 *
 * @return string
 */
function woo_logo() {
	if ( is_home() || is_front_page() || is_archive() || is_search() || is_404() ) {
		echo '<a id="logo" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'description' ) ) . '">' . get_avatar( get_option( 'admin_email' ), 200 ) . '</a>';
	}
}

/**
 * Social icons
 *
 * @return string
 */
function woo_display_social_icons() {
	$html = '';

	$html .= '<div id="connect">' . "\n";
	$html .= '<div class="social">' . "\n";

	$html .= '<a href="' . esc_url( 'http://twitter.com/claudiosmweb' ) . '" title="' . esc_attr__( 'Siga no Twitter', 'woothemes' ) . '" class="twitter"><span>' . esc_attr__( 'Siga no Twitter', 'woothemes' ) . '</span></a>' . "\n";
	$html .= '<a href="' . esc_url( 'http://github.com/claudiosmweb' ) . '" title="' . esc_attr__( 'Siga no GitHub', 'woothemes' ) . '" class="github"><span>' . esc_attr__( 'Siga no GitHub', 'woothemes' ) . '</span></a>' . "\n";
	$html .= '<a href="' . esc_url( 'http://profiles.wordpress.org/claudiosanches' ) . '" title="' . esc_attr__( 'Meus projetos no WordPress.org', 'woothemes' ) . '" class="wordpress"><span>' . esc_attr__( 'Meus projetos no WordPress.org', 'woothemes' ) . '</span></a>' . "\n";
	$html .= '<a href="' . esc_url( 'http://www.linkedin.com/in/claudiosmweb' ) . '" title="' . esc_attr__( 'Adicione no LinkedIn', 'woothemes' ) . '" class="linkedin"><span>' . esc_attr__( 'Adicione no LinkedIn', 'woothemes' ) . '</span></a>' . "\n";
	$html .= '<a href="' . esc_url( get_feed_link() ) . '" title="' . esc_attr__( 'Assinar Feed RSS', 'woothemes' ) . '" class="subscribe"><span>' . esc_attr__( 'Assinar Feed RSS', 'woothemes' ) . '</span></a>' . "\n";

	$html .= '</div>' . "\n";
	$html .= '</div>' . "\n";

	echo $html;
}

/**
 * Post meta.
 *
 * @return string
 */
function woo_post_meta() {
?>

	<aside class="post-meta">
		<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?> </span>
		<span class="post-category"><?php _e( 'in', 'woothemes' ) ?> <?php the_category( ', ') ?></span>
		<span class="post-comments"><?php comments_popup_link( __( 'Leave a comment', 'woothemes' ), __( '1 Comment', 'woothemes' ), __( '% Comments', 'woothemes' ) ); ?></span>
		<?php edit_post_link( __( 'Edit', 'woothemes' ), '<span class="edit">', '</span>' ); ?>
	</aside>

	<?php
}

function woo_cs_header_search() {
	get_search_form();
}

add_action( 'woo_nav_after', 'woo_cs_header_search' );

/**
 * Custom <body> classes.
 *
 * @param  array $classes
 *
 * @return array
 */
function wc_custom_body_classes( $classes ) {
	if ( is_singular( 'projects' ) ) {
		$classes[] = 'single-post';
	}

	return $classes;
}

add_filter( 'body_class', 'wc_custom_body_classes' );

/**
 * Register custom scritps.
 */
function woo_cs_custom_scripts() {
	wp_dequeue_script( 'fitvids' );
	wp_enqueue_script( 'fitvids', get_stylesheet_directory_uri() . '/assets/js/jquery.fitvids.min.js', array( 'jquery' ), '1.1' );
}

add_action( 'wp_enqueue_scripts', 'woo_cs_custom_scripts', 10 );
