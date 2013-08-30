(function($) {
	$(document).ready(function() {
		
		$('form#header-search').on('submit', function(e) {
			e.preventDefault();
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		

		$('#sidr-id-header-search').on('keypress', function() {
			console.log('pressed');
		});
	});
})(jQuery);