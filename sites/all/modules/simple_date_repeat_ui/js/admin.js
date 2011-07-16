Drupal.behaviors.sdruiAdmin = function() {
  $("#edit-simple-date-repeat-ui").bind('change', function() {
	if($(this).is(":checked")) {
	  $('#edit-simple-date-repeat-ui-label-wrapper').show(500);
	}
	else {
	  $('#edit-simple-date-repeat-ui-label-wrapper').hide(500);
	  }
  })
  .trigger('change');
}
