<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Neochrome BeastTV
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function beast_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'beast_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function beast_jetpack_setup
add_action( 'after_setup_theme', 'beast_jetpack_setup' );

function beast_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function beast_infinite_scroll_render