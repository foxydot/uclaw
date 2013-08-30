(function($) {
	$(document).ready(function() {
		
		$('form#header-search,#sidr-id-header-search').on('submit', function(e) {
			e.preventDefault();
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		
	});
})(jQuery);