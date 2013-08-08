(function($) {
	$(document).ready(function() {
		/*
		$('#sidebar .region-sidebar .menu > li > ul').css('display', 'none');
		
		$('#sidebar .region-sidebar .menu > li').not('.current').each(function() {
			if ($(this).find('ul').length === 1) {
				$(this).addClass('closed');
				$(this).children('a').addClass('clearfix');
				var text = $(this).children('a').html();			
				$(this).children('a').html('<span class="title">' + text + '</span><span class="click-area"><i class="icon-plus-sign-alt pull-right"></i></span>');
			}
			
		}); // each
		*/
		

		// Mobile submenu nav
		$('#mobile-submenus').on('click', function(e) {
			e.preventDefault();
			if ($(this).hasClass('open')) {
				$('#sidemenus').slideUp(500);
				$(this).find('.text').text('Additional Information');
				$(this).find('i').removeClass('icon-minus').addClass('icon-plus');
				$(this).removeClass('open');
			} else {
				$('#sidemenus').css('display', 'none').removeClass('hidden-phone').slideDown(500);
				$(this).find('.text').text('Hide Additional Information');
				$(this).find('i').removeClass('icon-plus').addClass('icon-minus');
				$(this).addClass('open');
			}
		});
		
		$('#sidebar .region-sidebar .menu').on('click', 'li.closed > a > .click-area', function(e) {
			e.preventDefault();
			var element = $(this).parent().parent().find('ul').not(':animated');
			if (element.length) {
				$('#sidebar .menu').find('.open > a > i:last').trigger('click');
				$(this).parent().parent().removeClass('closed').addClass('open').find('ul').not(':animated').slideDown(500);
				$(this).find('i').removeClass('icon-plus-sign-alt').addClass('icon-minus-sign-alt');
				$(this).parent().parent().find('.icon-double-angle-right').removeClass('icon-double-angle-right').addClass('icon-double-angle-down');
			}
		});
	
		$('#sidebar .region-sidebar .menu').on('click', 'li.open > a > .click-area', function(e) {
			e.preventDefault();
			var element = $(this).parent().parent().find('ul').not(':animated');
			if (element.length) {
				$(this).parent().parent().removeClass('open').addClass('closed').find('ul').not(':animated').slideUp(500);
				$(this).find('i').removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt');
				$(this).parent().parent().find('.icon-double-angle-down').removeClass('icon-double-angle-down').addClass('icon-double-angle-right');
			}
		});
	});
})(jQuery);