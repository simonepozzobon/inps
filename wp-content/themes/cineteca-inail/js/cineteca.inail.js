(function(global, doc, $) {
	"use strict";
	var websiteurl = "http://109.74.202.211/cineteca-inail/"

	var hello = "Hello, visit www.makeitapp.eu";

	var main = function() {
		console.log(hello);
	};

	$(global).load(main);
})(window, document, jQuery);