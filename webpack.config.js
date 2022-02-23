const defaultConfig = require('@wordpress/scripts/config/webpack.config');
module.exports = {
	...defaultConfig,
	entry: {
		'scrolling-sections': './blocks/scrolling-sections',
		'scrolling-section': './blocks/scrolling-section',
		'front-end': './blocks/scrolling-sections/front-end.js'
	},
};
