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

		$('#sidr').css('border', '3px solid red');
	});
})(jQuery);