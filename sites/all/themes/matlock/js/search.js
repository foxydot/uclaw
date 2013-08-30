(function($) {
	$(document).ready(function() {
		
		$('form#header-search').on('submit', function(e) {
			e.preventDefault();
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		

		$('#sidr').on('submit', 'form', function(e) {
			e.preventDefault();
			alert('submitting');
			var term = $(this).find('input[type="text"]').val();
			window.location = '/search/node/' + term;
		});		

		$('#sidr-id-header-search').submit(function() {
			
			alert('submitting 2');
		});

	});
})(jQuery);