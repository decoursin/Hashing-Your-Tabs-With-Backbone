define([
  'jquery',     // lib/jquery/jquery
  'underscore', // lib/underscore/underscore
  'backbone',    // lib/backbone/backbone
  'views/tabView'
], function($, _, Backbone, TabView){

	var HashView = Backbone.View.extend({
		allowHashToUpdateApp: false,

		updateApp: function (event) {
			var hash = this.getLocationHash();
			var tabViewSingle = require('views/tabView').getTabView();

			if(tabViewSingle && tabViewSingle.tabHashes && tabViewSingle.tabHashes.hasOwnProperty(hash)){
				tabViewSingle.manualChangeTab.call(tabViewSingle, hash);
			}
		},
		initialize: function (options) {
			_.bindAll(this, 'onhashchange');
			window.onhashchange = this.onhashchange;
		},
		onhashchange: function(event) {
			if (this.allowHashToUpdateApp) {
				this.updateApp(event);
			} else {
				this.allowHashToUpdateApp = true;
			}
		},
		setLocationHash: function(str) {
			this.allowHashToUpdateApp = false;
			window.location.hash = str;
		},
		getLocationHash: function() {
			return window.location.hash.substring(1);
		},
		getHashLength: function () {
			return location.hash.length;
		}
	});

	// Singleton
	var hashView = new HashView();

	return {
		getHashView: function () { return hashView; }
	};
});
