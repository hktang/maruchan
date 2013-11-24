<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package maruchan
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function maruchan_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
	 	'type'           => 'scroll',
	    'footer_widgets' => false,
	    'container'      => 'main',
	    'wrapper'        => false,
	    'render'         => false,
	    'posts_per_page' => 36
	) );
}
add_action( 'after_setup_theme', 'maruchan_jetpack_setup' );
