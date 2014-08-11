// Filename: router.js
define([
	'jquery',
	'underscore',
  	'backbone'
],	function($, _, Backbone){

	var AppRouter = Backbone.Router.extend({
		routes: {
			// Define some URL routes
			'login': 'login',
			'home/*': 'home',
			'foods': 'menu',

			// Default
			'*actions': 'defaultAction'
		}
	});

	// ATTN: Although router.js is being loaded, this file is not being used

	var initialize = function(){
		var app_router = new AppRouter;

		app_router.on('route:menu', function(splat){
			// Not being used
		});

		Backbone.history.start({pushState: true});
	};
	return {
		initialize: initialize
	};
});
