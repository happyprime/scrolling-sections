/**
 * Registers the scrolling sections block.
 */

import './scrolling-section';

const {
	registerBlockType,
} = wp.blocks;

const {
	__,
} = wp.i18n;

const {
	InnerBlocks,
} = ( 'undefined' === typeof wp.blockEditor ) ? wp.editor : wp.blockEditor;

registerBlockType( 'happyprime/scrolling-sections', {

	title: __( 'Scrolling Sections' ),

	description: __( 'Create full-height scrolling sections' ),

	icon: 'image-flip-vertical',

	category: 'common',

	attributes: {
		align: {
			type: 'string',
			default: 'full'
		},
	},

	supports: {
		align: [ 'full' ],
		multiple: false,
	},

	edit: () => {
		return (
			<section>
				<div>
					<InnerBlocks
						allowedBlocks={ [ 'happyprime/scrolling-section' ] }
					/>
				</div>
			</section>
		);
	},

	save: () => {
		return (
			<section>
				<div>
					<InnerBlocks.Content />
				</div>
			</section>
		);
	},

} );
