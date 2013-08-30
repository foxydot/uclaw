(function($) {
	$(document).ready(function() {
		
		$('form#header-search').on('submit', function(e) {
			e.preventDefault();
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		

		$('#sidr').on('submit', '#sidr-id-header-search', function(e) {
			e.preventDefault();
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		


	});
})(jQuery);