/**
 * Registers the scrolling sections block.
 */
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

import metadata from './block.json';

import './editor.css';

registerBlockType(metadata, {
	edit: () => {
		return (
			<section {...useBlockProps()}>
				<div>
					<InnerBlocks
						allowedBlocks={['happyprime/scrolling-section']}
					/>
				</div>
			</section>
		);
	},

	save: () => {
		return (
			<section {...useBlockProps.save()}>
				<div>
					<InnerBlocks.Content />
				</div>
			</section>
		);
	},
});
