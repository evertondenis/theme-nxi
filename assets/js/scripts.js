var nextidea = (function() {
	function init(){
		menu();
		depoimentos();
		headRoom()
		showMenu();

		var s = jQuery(document).scrollTop();
		if(s > 0) jQuery('.header').addClass("slideDown");
	}

	function menu() {
		jQuery('ul.menu li.dropdown, ul.menu li.dropdown-submenu').hover(function() {
			jQuery(this).find('.dropdown-toggle').attr("aria-expanded","true");
			jQuery(this).find(' > .dropdown-menu').stop(true, true).delay(50).fadeIn();
		}, function() {
			jQuery(this).find('.dropdown-toggle').attr("aria-expanded","false");
			jQuery(this).find(' > .dropdown-menu').stop(true, true).delay(50).fadeOut();
		});
	}

	function depoimentos() {
		jQuery('#slides').slidesjs({
	        width: 800,
	        height: 280,
	        play: {
	          active: false,
	          effect: "fade",
	          auto: true,
	          interval: 5000,
	          swap: false,
	          pauseOnHover: true,
	          restartDelay: 2500
	        },
	        pagination: {
	          active: true,
	          effect: "fade"
	        },
	        navigation: {
	          active: true
	        },
	        effect: {
	          slide: {
	            fade: 2000,
	            crossfade: true
	          }
	        }
	    });
	}

	function headRoom() {
		var myElement = document.querySelector("header");
		var headroom  = new Headroom(myElement, {
										"offset": 205,
										"tolerance": 5,
										"classes": {
											"initial": "animated",
											"pinned": "slideDown",
											"unpinned": "slideUp"
										}
									});
		headroom.init(); 
	}

	function showMenu(){
		jQuery('.c-hamburger').on('click', function(){
			(this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
			jQuery('.menu').toggleClass('is-active');
		});
	}

	return {
		init: init
	}

}());

(function(){
	nextidea.init();
}());