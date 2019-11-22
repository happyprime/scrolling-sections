<?php
/**
 * Handles the registration of the Scrolling Sections block.
 *
 * @package scrolling-sections
 */

namespace HappyPrime\ScrollingSections\Block;

add_action( 'init', __NAMESPACE__ . '\\register_block', 10 );
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\\enqueue_block_assets', 10 );

/**
 * Provides a block version number for scripts.
 *
 * @since 0.0.1
 *
 * @return string The version number.
 */
function block_version() {
	return '0.0.1';
}

/**
 * Registers the Scrolling Sections block.
 *
 * @since 0.0.1
 */
function register_block() {
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	wp_register_script(
		'happyprime-scrolling-sections',
		plugins_url( 'build/index.js', dirname( __FILE__ ) ),
		array( 'wp-blocks', 'wp-element' ),
		block_version(),
		true
	);

	wp_register_style(
		'happyprime-scrolling-sections-editor',
		plugins_url( 'editor.css', __FILE__ ),
		array(),
		block_version(),
	);

	wp_register_style(
		'happyprime-scrolling-sections',
		plugins_url( 'style.css', __FILE__ ),
		array(),
		block_version(),
	);

	register_block_type(
		'happyprime/scrolling-sections',
		array(
			'editor_script' => 'happyprime-scrolling-sections',
			'editor_style'  => 'happyprime-scrolling-sections-editor',
			'style'         => 'happyprime-scrolling-sections',
		)
	);
}

/**
 * Enqueues front-end JavaScript if appropriate.
 *
 * @since 0.0.1
 */
function enqueue_block_assets() {
	if ( is_admin() && ! has_block( 'happyprime/scrolling-sections' ) ) {
		return;
	}

	wp_register_script(
		'wheel-indicator',
		plugins_url( 'wheel-indicator.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element' ),
		block_version(),
		true
	);

	wp_enqueue_script(
		'happyprime-scrolling-sections-front-end',
		plugins_url( 'front-end.js', __FILE__ ),
		array( 'wheel-indicator' ),
		block_version(),
		true
	);

	wp_add_inline_script(
		'happyprime-scrolling-sections-front-end',
		'sectionScroll.init();'
	);

}
