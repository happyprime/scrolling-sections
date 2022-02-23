<?php
/**
 * Handles the registration of the Scrolling Sections block.
 *
 * @package scrolling-sections
 */

namespace HappyPrime\ScrollingSections\Block;

add_action( 'init', __NAMESPACE__ . '\register_block', 10 );
add_action( 'enqueue_block_assets', __NAMESPACE__ . '\enqueue_block_assets', 10 );

/**
 * Registers the Scrolling Sections block.
 *
 * @since 0.0.1
 */
function register_block() {
	register_block_type_from_metadata(
		dirname( __DIR__ ) . '/blocks/scrolling-sections/'
	);

	register_block_type_from_metadata(
		dirname( __DIR__ ) . '/blocks/scrolling-section/'
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

	$asset_data = require_once dirname( __DIR__ ) . '/build/front-end.asset.php';

	wp_register_script(
		'happyprime-scrolling-sections-front-end',
		plugins_url( 'build/front-end.js', __DIR__ ),
		$asset_data['dependencies'],
		$asset_data['version'],
		true
	);

	wp_add_inline_script(
		'happyprime-scrolling-sections-front-end',
		'sectionScroll.init();'
	);

}
