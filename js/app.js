// Filename: app.js
define([
  'jquery',
  'underscore',
  'backbone',
  'router', // Request router.js
  'views/applicationView'
], function($, _, Backbone, Router, ApplicationView){

	var initialize = function(){
		// Pass in our Router module and call it's initialize function
		Router.initialize();
		var applicationView = new ApplicationView();
	};


	return {
		initialize: initialize
	};
});
