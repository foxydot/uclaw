(function($) {
	$(document).ready(function() {
		$('#sidebar .region-sidebar .menu > li > ul').css('display', 'none');
		
		$('#sidebar .region-sidebar .menu > li').each(function() {
			if ($(this).find('ul').length === 1) {
				$(this).addClass('closed');
				$(this).children('a').append('<i class="icon-plus-sign-alt pull-right"></i>');
			}
			
		}); // each
		
		$('#sidebar .region-sidebar .menu').on('click', 'li.closed > a > i', function(e) {
			e.preventDefault();
			$('.expandable-list').find('.open > a > i:last').trigger('click');
			$(this).parent().parent().removeClass('closed').addClass('open').find('ul').stop(true, false).slideDown(500);
			$(this).removeClass('icon-plus-sign-alt').addClass('icon-minus-sign-alt');
			$(this).parent().parent().find('.icon-double-angle-right').removeClass('icon-double-angle-right').addClass('icon-double-angle-down');
		});
	
		$('#sidebar .region-sidebar .menu').on('click', 'li.open > a > i', function(e) {
			e.preventDefault();
			$(this).parent().parent().removeClass('open').addClass('closed').find('ul').stop(true, false).slideUp(500);
			$(this).removeClass('icon-minus-sign-alt').addClass('icon-plus-sign-alt');
			$(this).parent().parent().find('.icon-double-angle-down').removeClass('icon-double-angle-down').addClass('icon-double-angle-right');
		});
	});
})(jQuery);