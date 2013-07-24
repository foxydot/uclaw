(function($) {
	$(document).ready(function() {
		// Rewrite links to current server
		var badlinks = Array('http://www.law.uc.edu', 'http://law.uc.edu', 'www.law.uc.edu', 'http://law.uc.edu');
		
		for(i=0; badlinks[i]; i++) {
			$('a[href^="' + badlinks[i] + '"]').each(function() {				
				var newlink = $(this).prop('href').substr($(this).prop('href').lastIndexOf(badlinks[i]) + badlinks[i].length);
				$(this).prop('href', newlink);				
			});
		}
	});
})(jQuery);