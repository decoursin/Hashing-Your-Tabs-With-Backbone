requirejs.config({
	// You should change this value only
	// used for this example
    baseUrl: 'js/',

    paths: {
		jquery: 'libs/jquery',
		underscore: 'libs/underscore',
		backbone: 'libs/backbone'
    }
});

require([

  // Load our app module and pass it to our definition function
  'app'
], function(App){
	
	// The "app" dependency is passed in as "App"
	App.initialize();
});
