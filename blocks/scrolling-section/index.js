/**
 * Registers the scrolling section block.
 */

import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import metadata from './block.json';

registerBlockType(metadata, {
	edit: () => {
		return (
			<article {...useBlockProps()}>
				<div>
					<InnerBlocks />
				</div>
			</article>
		);
	},

	save: () => {
		return (
			<article {...useBlockProps.save()}>
				<div>
					<InnerBlocks.Content />
				</div>
			</article>
		);
	},
});
