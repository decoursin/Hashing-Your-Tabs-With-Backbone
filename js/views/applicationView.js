define([
  'jquery',     // lib/jquery/jquery
  'underscore', // lib/underscore/underscore
  'backbone',    // lib/backbone/backbone
  'views/tabView',
  'views/hashView'
], function($, _, Backbone, TabView, HashView){
	var ApplicationView = Backbone.View.extend({
		initialize: function (options) {
			var tabViewSingle = TabView.getTabView();
			// Follow hash changes
			var hashViewSingle = HashView.getHashView();
		}
	});

	return ApplicationView;
});
