
var footer_reach = 0;
var articleFont = 16;

jQuery(window).scroll(function() {

	var mainmenu = jQuery("#main-menu.willfix");

	if(parseInt(mainmenu.attr("rel")) <= Math.abs(parseInt(jQuery(window).scrollTop()))){
		mainmenu.addClass("isfixed");
	}else{
		mainmenu.removeClass("isfixed");
	}

	if(jQuery(".sidebar-fixed").length){

		if(parseInt(jQuery("#sidebar").height()) > parseInt(jQuery(".main-content").height())){
			jQuery(".sidebar-fixed.is-now-fixed").removeClass("is-now-fixed").css("paddingTop", "0px");
			return false;
		}

		var fixedSidebar = jQuery(".sidebar-fixed"),
			additionalPx = (jQuery("#wpadminbar").length > 0)?32:0;
		if(jQuery(window).scrollTop()+100+additionalPx >= fixedSidebar.offset().top){
			var newtop = parseInt(jQuery(window).scrollTop())-parseInt(fixedSidebar.offset().top)+100+additionalPx,
				v1 = parseInt(fixedSidebar.height()),
				v2 = parseInt(newtop)+parseInt(fixedSidebar.offset().top);

			if(footer_reach-74 <= (v1+v2)){
				// reached end
			}else{
				fixedSidebar.addClass("is-now-fixed").css("paddingTop", newtop+"px");
			}
		}else{
			jQuery(".sidebar-fixed.is-now-fixed").removeClass("is-now-fixed").css("paddingTop", "0px");
		}

	}

});


jQuery(window).ready(function() {

	jQuery('.ot-scrollnimate').each( function(i){
		var bottom_of_object = jQuery(this).offset().top;
		var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

		if( bottom_of_window <= bottom_of_object ){
			jQuery(this).children().css("visibility", "hidden");
		}else{
			scrollNimate(jQuery(this));
			jQuery(this).removeClass("ot-scrollnimate");
		}
	});

	jQuery(window).scroll( function(){
		jQuery('.ot-scrollnimate').each( function(i){
			var bottom_of_object = jQuery(this).offset().top;
			var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();

			if( bottom_of_window > bottom_of_object ){
				scrollNimate(jQuery(this));
				jQuery(this).removeClass("ot-scrollnimate");
			}
		});
	});


	jQuery(".woocommerce-tabs .tabs a").click(function(){
		var thisel = jQuery(this),
			thisopen = thisel.attr("href").split("#")[1];
		thisel.parent().addClass("active").siblings("li.active").removeClass("active").parent().parent().children(".panel").hide().siblings(".panel#"+thisopen).show();
		return false;
	});




	if(jQuery(".gallery-thumbnail-list").length){
		myScroll = new IScroll('.gallery-thumbnail-list', {
			scrollbars: true,
			mouseWheel: true,
			interactiveScrollbars: false,
			shrinkScrollbars: 'scale',
			fadeScrollbars: false,
			tap: true
		});
	}


	
	jQuery("#main-menu.willfix").each(function() {
		var thisel = jQuery(this);
		thisel.wrap("<div class='main-menu-parent'></div>").attr("rel", thisel.offset().top).parent().height(thisel.height());
	});

	jQuery(".alert-box .close-alert, .coloralert .close-alert").click(function() {
		jQuery(this).parent().fadeOut();
		return false;
	});

	jQuery(".category-ordering a").click(function() {
		var thisel = jQuery(this),
			thisdata = thisel.data("trigger-cat"),
			elementanimate = "fadeIn";
		thisel.addClass("active").siblings(".active").removeClass("active");
		if(thisdata == "" || thisdata == "*"){
			thisel.parent().parent().siblings("div").find("[data-self-cat]").removeClass("animated "+elementanimate).css("display", "block");
			thisel.parent().parent().siblings("div").find("[data-self-cat]").addClass("animated "+elementanimate);
		}else{
			thisel.parent().parent().siblings("div").find("[data-self-cat]").each(function() {
				var newel = jQuery(this),
					arraycats = (!newel.data("self-cat"))?"*":newel.data("self-cat").split(" ");

				if(jQuery.inArray(thisdata, arraycats) >= 0){
					if (newel.hasClass("category-select-block")){
						newel.removeClass("animated "+elementanimate).css("display", "flex").addClass("animated "+elementanimate);
					}else{
						newel.removeClass("animated "+elementanimate).css("display", "block").addClass("animated "+elementanimate);
					}
				}else{
					newel.css("display", "none");
				}
			});
		}
		return false;
	});

	footer_reach = parseInt(jQuery(".footer").offset().top);
	setTimeout(function(){
		footer_reach = parseInt(jQuery(".footer").offset().top);
	}, 1000);

	jQuery(".ot-widget-gallery .item-footer > a").click(function(){
		var thisel = jQuery(this),
			thiswidth = parseInt(thisel.siblings(".item-thumbnails").width()),
			thisinner = thisel.siblings(".item-thumbnails").children(".item-thumbnails-inner"),
			thissize = Math.ceil(thisinner.children("a").length/3);

		if(!thisel.parent().data("current-page")){
			thisel.parent().data("current-page", 0);
		}

		if(thisel.attr("href") == "#galery-right"){
			if(thissize <= parseInt(thisel.parent().data("current-page"))+1)return false;
			thisel.parent().data("current-page", parseInt(thisel.parent().data("current-page"))+1);
			thisinner.css("margin-left", "-"+(thisel.parent().data("current-page")*(thiswidth+6))+"px");
		}else
		if(thisel.attr("href") == "#galery-left"){
			if(0 > parseInt(thisel.parent().data("current-page"))-1)return false;
			thisel.parent().data("current-page", parseInt(thisel.parent().data("current-page"))-1);
			thisinner.css("margin-left", "-"+(thisel.parent().data("current-page")*(thiswidth+6))+"px");
		}

		return false;
	});

	jQuery(".ot-widget-gallery .item-footer .item-thumbnails-inner > a").click(function(){
		var thisel = jQuery(this);
		
		thisel.parent().parent().parent().siblings(".item-header").children("a").css("display", "none").addClass("markforremove").parent().prepend("<a href='"+thisel.data("href")+"' class='animated fadeIn'><img src='"+thisel.attr("href")+"' /></a>").children(".markforremove").remove();
		return false;
	});


	// Accordion blocks
	jQuery(".accordion > div > a").click(function () {
	    var thisel = jQuery(this).parent();
	    if (thisel.hasClass("active")) {
	        thisel.removeClass("active").children("div").animate({
	            "height": "toggle",
	            "opacity": "toggle",
	            "padding-top": "toggle"
	        }, 300);
	        return false;
	    }
	    // thisel.siblings("div").removeClass("active");
	    thisel.siblings("div").each(function () {
	        var tz = jQuery(this);
	        if (tz.hasClass("active")) {
	            tz.removeClass("active").children("div").animate({
	                "height": "toggle",
	                "opacity": "toggle",
	                "padding-top": "toggle"
	            }, 300);
	        }
	    });
	    // thisel.addClass("active");
	    thisel.addClass("active").children("div").animate({
	        "height": "toggle",
	        "opacity": "toggle",
	        "padding-top": "toggle"
	    }, 300);
	    return false;
	});


	// Tabbed blocks
	jQuery(".short-tabs").each(function () {
		var thisel = jQuery(this);
		thisel.children("div").eq(0).addClass("active");
		thisel.children("ul").children("li").eq(0).addClass("active");
	});

	jQuery(".short-tabs > ul > li a").click(function () {
		var thisel = jQuery(this).parent();
		thisel.siblings(".active").removeClass("active");
		thisel.addClass("active");
		thisel.parent().siblings("div.active").removeClass("active");
		thisel.parent().siblings("div").eq(thisel.index()).addClass("active");
		return false;
	});

	jQuery(".lightbox").click(function () {
		jQuery(".lightbox").css('overflow', 'hidden');
		jQuery("body").css('overflow', 'auto');
		jQuery(".lightbox .lightcontent").fadeOut('fast');
		jQuery(".lightbox").fadeOut('slow');
	}).children().click(function (e) {
		return false;
	});


	jQuery(".article-meta-block a.font-meta-down, .article-meta-block a.font-meta-up").click(function(){
		var thisel = jQuery(this);

		if(thisel.hasClass("font-meta-down")){
			articleFont = (articleFont <= 16)?16:articleFont-1;
		}else{
			articleFont = (articleFont >= 25)?25:articleFont+1;
		}
		thisel.siblings(".font-meta-num").html(articleFont).parent().parent().parent().parent().parent().css("font-size", articleFont+"px");
		return false;
	});

	jQuery(".category-review-block .item a .featured-text, .ot-panel-block > div.article-featured-block .item a .featured-text").animate({
		"height":"toggle"
	}, 1);

	jQuery(".category-review-block .item a, .ot-panel-block > div.article-featured-block .item a").mouseenter(function(){
		jQuery(this).find(".featured-text").animate({
			"height":"toggle",
			"paddingTop": "10px"
		}, 450, "swing");
	});

	jQuery(".category-review-block .item a, .ot-panel-block > div.article-featured-block .item a").mouseleave(function(){
		jQuery(this).find(".featured-text").animate({
			"height":"toggle",
			"paddingTop": "0px"
		}, 450, "swing");
	});


	setTimeout(function(){
		jQuery(".owl-carousel").each(function(){
			var thisel = jQuery(this);
			thisel.css("display", "none");
			thisel.width(thisel.parent().width());
			thisel.css("display", "block");
		});
	}, 100);

	var ffversion = '36';
	var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/'+ffversion) > -1;
	var opversion = '12';
	var is_opera = navigator.userAgent.toLowerCase().indexOf('version/'+opversion) > -1;
	if(is_firefox || is_opera){
		jQuery('img').each(function(){
			var thisimg = jQuery(this);

			if(parseInt(thisimg.width()) >= parseInt(thisimg.prop('naturalWidth'))){
				thisimg.css("max-width", thisimg.width());
			}else{
				thisimg.css("width", thisimg.prop('naturalWidth'));
			}
			thisimg.css("width", "100%");
		});
	}

});


function lightboxclose() {
	jQuery(".lightbox").css('overflow', 'hidden');
	jQuery(".lightbox .lightcontent").fadeOut('fast');
	jQuery(".lightbox").fadeOut('slow');
	jQuery("body").css('overflow', 'auto');
}

// Animation time of revieling and hiding menu (defaut = 400)
var _datMenuAnim = 400;
// Animation effect for now it is just 1 (defaut = "effect-1")
var _datMenuEffect = "effect-3";
// Submenu dropdown animation (defaut = true)
var _datMenuSublist = true;
// If fixed header is showing (defaut = true)
var _datMenuHeader = true;
// Header Title
var _datMenuHeaderTitle = "MENU MOBILE";
// If search is showing in header (defaut = true)
var _datMenuSearch = true;
// Search icon (FontAwesome) in header (defaut = fa-search)
var _datMenuCustomS = "fa-search";
// Menu icon (FontAwesome) in header (defaut = fa-bars)
var _datMenuCustomM = "fa-bars";  

function scrollNimate(_element) {

	var datanime = _element.data("animation"),
		uptimeout = 0;
	
	_element.children().each(function () {
		var coolem = jQuery(this);
		coolem.css("visibility", "hidden").css("opacity", "0");
		setTimeout(function () {
			coolem.css("visibility", "visible").css("opacity", "1").addClass("animated "+datanime);
		}, uptimeout);
		uptimeout = uptimeout+200;
	});
	_element.removeClass("ot-scrollnimate");
	return false;

}