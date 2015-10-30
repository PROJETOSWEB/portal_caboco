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
		    var userFeed = new Instafeed({	        get: 'user',	        userId: 12964951,	        accessToken: '12964951.467ede5.20020c1ffb49472480dbfdfc8db0d1e5'	    });	    userFeed.run();
	
	
});
