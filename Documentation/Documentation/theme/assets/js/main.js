// Animated Tooltips 
jQuery(document).ready(function ($) {
	try {
			Typekit.load();
		}
		catch (e) {
	};
	
	$('.swiftype-widget .autocomplete').addClass('fadeInDownSmall');

	$(".support-tooltip").children('span').addClass('animated hidden');
	$(".support-tooltip").hover(function ()	{
		var tooltip = $(this),
				parentWidth = tooltip.outerWidth(),
				width = tooltip.children('span').outerWidth(),
				screenWidth = $(window).width();
		tooltip.children('span').css('left', parentWidth / 2 - 72);
		tooltip.children('span').removeClass().addClass('animated fadeInDownSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function ()
		{
			tooltip.children('span').removeClass();
		});
		var offset = parseInt(tooltip.children('span').offset().left, 10);
		console.log(offset, width, screenWidth);
		if (offset + width > screenWidth) {
			console.log('in');
			tooltip.children('span').css('left', screenWidth - offset - width + parentWidth / 2 - 72);
		}
		else {
			tooltip.children('span').css('left', parentWidth / 2 - 72);
		}
	}, function () {
		var tooltip = $(this),
				parentWidth = tooltip.outerWidth();
		tooltip.children('span').addClass('hidden').css('left', parentWidth / 2 - 72);
	});

	// SideBar Menu Parent Items
	$(".sidebar-nav li").has('ul').addClass('parent'); 

	$('.nav-menu').slicknav();
	$(".nav-menu ul").addClass('animated hidden');
	var menuItemWidth, submenuItemWidth;
	$(".nav-menu > li").hover(function () {
		var $this = $(this);
		$this.children('ul').removeClass().addClass('animated');
		menuItemWidth = $this.innerWidth();
		submenuItemWidth = $this.children("ul").innerWidth();
		$this.children("ul").css('left', (menuItemWidth - submenuItemWidth) / 2);
		$this.children('ul').addClass('fadeInDownSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function ()
		{
			$this.children('ul').removeClass().addClass('animated')
		});
	}, function () {
		$(this).children('ul').addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function ()
		{
			$(this).removeClass().addClass('hidden')
		})
	});
	
	var m = $('#page');
	if(m.is(".exportss")){
		$('.page-header').css({'background-image': 'url(theme/assets/images/slide.jpg)'});
		$('.page-header').prepend('<img src="theme/assets/images/slide.jpg" alt="" class="testimage hidden">');
	}else{
		$('.page-header').css({'background-image': 'url(/theme/assets/images/slide.jpg)'});
		$('.page-header').prepend('<img src="/theme/assets/images/slide.jpg" alt="" class="testimage hidden">');
	}

	// Animated Header 
	$('.testimage').load(function (){
		$(".main-header .spinner, .main-header .testimage").remove();
		$(".page-header, .site-logo, .primary-navigation").removeClass('invisible').addClass('animated fadeIn');
		setTimeout(function () {
			$(".page-title-before").removeClass('invisible').addClass('animated fadeInDown');
			$(".page-title").removeClass('invisible').addClass('animated fadeInLeft');
			$(".page-subtitle").removeClass('invisible').addClass('animated fadeInRight');
			$(".search").removeClass('invisible').addClass('animated fadeInUp');
		}, 400);
	});

	// Placeholders
	if ($("[placeholder]").size() > 0) {
		$.Placeholder.init({color: "#0c9"});
	}

	// Show/Hide Themes **
	var themesHidden = true;
	$('#toggleThemes').on('click', function (e) {
		e.preventDefault();
		$('.additional-themes').slideToggle(800, function () {
			if (themesHidden) {
				$('#toggleThemes').children('span').text('See Less THEMES');
				themesHidden = false;
			}
			else {
				$('#toggleThemes').children('span').text('See ALL THEMES');
				themesHidden = true;
			}
		});
	});
	
	// Search
	// Filter Dropdown Options
	var timeoutId;
	$('#query').on('input', function () {
		clearTimeout(timeoutId);
		var value = $(this).val();
		timeoutId = setTimeout(function () {
			var dropdown = $('#search-options');
			dropdown.find('li').addClass('hidden').removeClass('first').each(function () {
				var $this = $(this),
						name = $this.children('span').text();
				if (name.match(new RegExp(value, 'i'))) {
					$this.removeClass('hidden');
				}
			});
			dropdown.find('li:not(.hidden)').eq(0).addClass('first');
			if (value.length > 2 && dropdown.find('li:not(.hidden)').length) {
				if (dropdown.hasClass('hidden')) {
					dropdown.removeClass('hidden').addClass('fadeInDownSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
						dropdown.removeClass('fadeInDownSmall');
					});
				}
			}
			else {
				if (!dropdown.hasClass('hidden')) {
					dropdown.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
						dropdown.removeClass('fadeOutUpSmall').addClass('hidden');
					});
				}
			}
			if (dropdown.find('li:not(.hidden)').length < 6) {
				dropdown.addClass('noscroll');
			}
			else {
				dropdown.removeClass('noscroll');
			}
		}, 300);
	});
	
	// Submit a Search Option
	$('#search-options').find('span').on('click', function () {
		var value = $(this).text();
		$('#query').val(value);
		$('#search-form').submit();
	});
	
	// Show Categories
	$('#category').on('click', function () {
		var category = $('#search-categories');
		$('#search-options').removeClass('fadeInDownSmall fadeOutUpSmall').addClass('hidden');
		category.removeClass('hidden').addClass('fadeInDownSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
			category.removeClass('fadeInDownSmall');
		});
	});
	
	// Select Category
	$('#search-categories').find('span').on('click', function () {
		if (!$(this).closest('li').hasClass('optgroup')) {
			var category = $('#category');
			var search_categories = $('#search-categories');
			category.val($(this).text());
			category.data('value', $(this).closest('[data-value]').data('value'));
			search_categories.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
				search_categories.removeClass('fadeOutUpSmall').addClass('hidden');
			});
		}
	});
	
	// Hide Dropdowns
	$(document).click(function (e){
		var clicked = $(e.target);
		if (!clicked.hasClass("query") && !clicked.closest(".scrollbar").length && !$('#search-options').hasClass("hidden")) {
			var dropdown = $('#search-options');
			dropdown.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
				dropdown.removeClass('fadeOutUpSmall').addClass('hidden');
			});
		}
		if (!clicked.hasClass("category") && !clicked.closest(".scrollbar").length && !$('#search-categories').hasClass("hidden")) {
			var category = $('#search-categories');
			category.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
				category.removeClass('fadeOutUpSmall').addClass('hidden');
			});
		}
	});

	// Select Category **
	// Show Categories
	$('#category2').on('click', function (){
		var category = $('#search-categories2');
		$('#search-options, #search-categories').removeClass('fadeInDownSmall fadeOutUpSmall').addClass('hidden');
		category.removeClass('hidden').addClass('fadeInDownSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
			category.removeClass('fadeInDownSmall');
		});
	});
	
	// Select Category
	$('#search-categories2').find('span').on('click', function (){
		if (!$(this).closest('li').hasClass('optgroup')) {
			var category = $('#category');
			var category2 = $('#category2');
			var search_categories2 = $('#search-categories2');
			category.val($(this).text());
			category.data('value', $(this).closest('[data-value]').data('value'));
			category2.val($(this).text());
			category2.data('value', $(this).closest('[data-value]').data('value'));
			category.closest('form').submit();
			search_categories2.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
				search_categories2.removeClass('fadeOutUpSmall').addClass('hidden');
			});
		}
	});
	
	// Hide Dropdown
	$(document).click(function (e){
		var clicked = $(e.target);
		if (!clicked.hasClass("category2") && !clicked.closest(".scrollbar").length && !$('#search-categories2').hasClass("hidden")) {
			var category = $('#search-categories2');
			category.addClass('fadeOutUpSmall').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
				category.removeClass('fadeOutUpSmall').addClass('hidden');
			});
		}
	});

	// jScrollPane
	$('.scrollbar').jScrollPane({
		autoReinitialise: true,
		verticalGutter  : 0
	});

	// scroling sideBar
    $('body').scrollspy();

});

$(window).load(function() {
	var m = $('#page');
	if(m.is(".exportss")){
		 // tabs sidebar
		$('ul.sidebar-nav').on('click', 'li:not(.active)', function() {  
	    	$(this).addClass('active').siblings().removeClass('active');
	  	});
	  	
	  	$("#myNav").affix({
	        offset: { 
	            top: 675 
	     	}
    	});
    	$('.fixed-block').find('ul li').removeClass("active")
	}
	console.log("loads files");
});
