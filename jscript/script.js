$(document).ready(function(){
	
	"use strict";
	

	
	
	/* Social Media Feeds */
	
	enableInstagramFeed(); // Instagram Feed
	
	

	
	
	/* ============================== */
	/* 			FUNCTIONS		      */
	/* ============================== */
	
	
	
	/* Instagram Feed */
	function enableInstagramFeed(){
		
		if($('#instagram-feed').length){
			var instagram_feed = new Instafeed({
				get: 'popular',
				clientId: '0ce2a8c0d92248cab8d2a9d024f7f3ca',
				target: 'instagram-feed',
				template: '<li><a target="_blank" href="{{link}}"><img src="{{image}}" /></a></li>',
				limit: 9
			});
			instagram_feed.run();
		}
		
	}
	
	
});
