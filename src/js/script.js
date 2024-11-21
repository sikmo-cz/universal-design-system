import { helpers } from './components/helpers.js';
// import { example } 		from './components/example.js';

window.theme = {
	globals: {
		isTouch: typeof window !== 'undefined' && 'ontouchstart' in window,
		isTabActive: true,
	},

	init: function () {
		var self = this;
		alert("yes");
		// example.init();
	},
};

document.addEventListener('DOMContentLoaded', function () {
	theme.init();
});