(function($) {
	$(document).ready(function() {
		// Get sections all same height
		var maxheight = 0;
		$('#main-dropdown').css({'visibility': 'hidden', 'display': 'block', 'height': 0});
		$('#main-dropdown section').each(function() {
			if ($(this).height() > maxheight) { maxheight = $(this).height(); }
		});
		$('#main-dropdown').css({'visibility': 'visible', 'display': 'none', 'height': 'auto'});
		
		$('#main-dropdown section').css('height', maxheight);
		
		// Animation
		$('.main-nav').mouseenter(function() {
			$(this).find('#main-dropdown').slideDown(500);
		}).mouseleave(function() {
			$(this).find('#main-dropdown').stop(true, false).slideUp(500);
		});
	
		// Top hovers
		$('.main-nav .top-level a').mouseenter(function() {
			$('#main-dropdown section:eq(' + $(this).index() + ')').addClass('hovered');
		}).mouseleave(function() {
			$('#main-dropdown section.hovered').removeClass('hovered');
		});
		
		// Scrolling
		var main_nav = $('.main-nav');
		//$('header').css('height', $('header').css('height'));
		main_nav.css({'top': 0, 'z-index': 200, 'width': '100%'});
		var stop_at = main_nav.offset().top;
		
		$(window).scroll(function() {
			if ($(this).scrollTop() >= stop_at) {
				main_nav.css({'position': 'fixed'});
			} else {
				main_nav.css({'position': 'relative'});
			}
		});
		
		// Secondary Nav
		$('#secondary-nav').on('mouseover', 'li', function(e) {
			var drop = $(this).find('.sub');
			$(this).data('hovering', true);
			drop.slideDown(250);
		}).on('mouseout', 'li', function(e) {
			var drop = $(this).find('.sub');
			if ($(this).parent().hasClass('sub')) { return; }
			
					
			// Waits half a second to check if accidental mouse out or just en route to drop
			$(this).data('hovering', false);
			var tthis = $(this);
			setTimeout(function() {
				if (!tthis.isHovering()) {
					drop.slideUp(250);
				}
			}, 500);
		});
		
		$.fn.isHovering = function() {
			return $(this).data('hovering');
		}
		
	});
})(jQuery);