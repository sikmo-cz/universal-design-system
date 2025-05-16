var helpers = {
	init: function () {
		
	},

	throttle: function (fn, wait) {
		var time = Date.now();
		return function () {
			if (time + wait - Date.now() < 0) {
				fn();
				time = Date.now();
			}
		};
	},

	setCookie(name, value, days) {
		var expires = '';
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = '; expires=' + date.toUTCString();
		}
		document.cookie = name + '=' + (value || '') + expires + '; path=/';
	},

	getCookie(name) {
		var nameEQ = name + '=';
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	},

	eraseCookie(name) {
		document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	},

	isOnScreen: function(element) {
		var win = window;
	
		var viewport = {
			top: win.scrollY,
			left: win.scrollX
		};
		
		viewport.right = viewport.left + win.innerWidth;
		viewport.bottom = viewport.top + win.innerHeight;
	
		var bounds = element.getBoundingClientRect();
		bounds = {
			top: bounds.top + viewport.top,
			left: bounds.left + viewport.left,
			right: bounds.left + bounds.width,
			bottom: bounds.top + bounds.height
		};
	
		return !(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom);
	},
};

export { helpers };
