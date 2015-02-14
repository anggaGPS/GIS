$(document).ready(function(){
		
		$("#side_nav a.minimize").click(function(){
				$("#side_nav").toggleClass('closed', 800);
				$("#side_nav > ul li a > span").fadeToggle();
				$("#side_nav > ul li > span.icon").fadeToggle();
				$("#main").toggleClass('grid_15',800);
				$(this).toggleClass('minimize_closed');
				
				$('#side_nav > ul > li.openable > div.accordion').slideUp().parent().removeClass('active');
				$('#side_nav > ul > li.openable > div.accordion').prev().removeClass('active');
				
		});
	
		$("#top_nav a.minimize").click(function(){
				$("#top_nav").toggleClass('closed', 800);
				$(this).toggleClass('minimize_closed');
		});
		
		$("#footer a.minimize").click(function(){
				$("#footer_wrapper").toggleClass('closed', 800);
				$(this).toggleClass('minimize_closed');
		});

	$("ul li ul").hide();
	$("li").mouseenter(function(){
	    $(this).children("ul").fadeIn('fast');
	});

	$("li").mouseleave(function(){
	    $(this).children("ul").hide();
		$(this).find('li.openable').removeClass('active').find('div.accordion').hide();
	});
	
	$(".mega_menu").hide();
	$("li.has_mega_menu").mouseenter(function(){
		$(this).children('.mega_menu').fadeIn();
	});
	
	$("li.has_mega_menu").mouseleave(function(){
	    $(this).children(".mega_menu").hide();
	});	
	
	$(".drop_box").hide();
	$("li").mouseenter(function(){
		$(this).children('.drop_box').fadeIn();
	});
	
	$("li").mouseleave(function(){
	    $(this).children(".drop_box").hide();
	});
	
	// Accordion 
	
	$('li .accordion').parent().addClass('openable');
	//Set default open/close settings
	$('li .accordion').hide(); //Hide/close all containers
	
	//On Click
	$('li.openable').click(function(){
		
		if( $(this).children('div.accordion').is(':hidden') ) {
			 //If immediate next container is closed...	
			$(this).siblings().removeClass('active').children('div.accordion').slideUp(); //Remove all "active" state and slide up the immediate next container
			$(this).toggleClass('active').children('div.accordion').slideDown(); //Add "active" state to clicked trigger and slide down the immediate next container
		}
		else {
			$(this).removeClass('active').children('div.accordion').slideUp();
		}
		
		if( $(this).parent().parent().is('#side_nav')){
			openTheSidenav();				
		}

		return false; //Prevent the browser jump to the link anchor
	});
	
	
	$('ul.slide_left').siblings('span').addClass('left');
	$('ul.accordion li.link a').click(function(){
		var url = $(this).attr('href');
			window.location = url;
	});
	
	function openTheSidenav(){
		$("#side_nav").removeClass('closed', 800);
		$("#side_nav > ul li a span").fadeIn();
		$("#side_nav > ul li span.icon").fadeIn();
		$("#side_nav > ul li a span.icon").fadeIn();
		$("#main").removeClass('grid_15',800);
		$(this).removeClass('minimize_closed');
		}
		
	$('#colour_switcher a').click(function(){
		var colour = $(this).attr('id');
		var cssUrl = ('theme_'+colour+'.css');
		
		var link = $("<link>");
		link.attr({
		        type: 'text/css',
		        rel: 'stylesheet',
		        href: 'styles/skins/'+cssUrl
				});
				
		$("head").append( link );
		
        $("img").each(function(){
              $(this).attr("src", $(this).attr("src").replace("grey", "white"));  
        });
	});
	
	$('#bg_switcher a').click(function(){
		var link = $(this).attr('href');
		var cssLink = ('url('+link+')');
		$('body').css('background',cssLink);
		return false;
	});
	
	$('#width_slider').slider({
		range:"min",
		min:900,
		max:1260,
		value:960,
		slide:changeWidth,
		change:changeWidth
		
	});
	
	function changeWidth(){
	var sliderWidth = $('#width_slider').slider("value");
		$("#wrapper").css("width", sliderWidth);
		$("#footer_wrapper").css("width", sliderWidth);
		
	}
	
});  		