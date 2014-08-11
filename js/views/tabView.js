define([
  'jquery',     // lib/jquery/jquery
  'underscore', // lib/underscore/underscore
  'backbone',    // lib/backbone/backbone
  'views/hashView'
], function($, _, Backbone, HashView){
	var tabPostFix = 'Tab';

	var TabView = Backbone.View.extend({
		tabHashes: {
			first: '1',
			second: '2',
			third: '3',
			fourth: '4'
		},
		events: {
			"click .tab" : "userChangeTab"
		},
		initialize: function (options) {
			this.$el = $(".nav");
			this.hashView = HashView.getHashView();

			var hashLength = this.hashView.getHashLength();
			if(hashLength === 0)
			{
				this.hashView.setLocationHash('first');
			}
		},
		userChangeTab: function (event) {
			var selectedTab = event.currentTarget;
			var idx = $('.tab').index(selectedTab);
			this.$('li.active').removeClass('active');
			this.$(selectedTab).addClass('active');

			var hash = $('.tabPage:eq(' + idx +')').attr('id').replace(tabPostFix,'');   
			this.hashView.setLocationHash(hash);

			$('.tabPage').hide().filter(':eq(' + idx + ')').show();

			return false;
		},
		manualChangeTab: function (hash) {
			this.$('li.active').removeClass('active');

			var number = this.tabHashes[hash];
			$('#tab' + number).addClass('active');

			$('.tabPage').hide().filter('#' + hash + tabPostFix).show();
		}
	});

	// Singleton
	var tabView = new TabView();

	return {
		getTabView: function () { return tabView; }
	};
});
