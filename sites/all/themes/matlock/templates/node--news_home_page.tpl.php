	<?php
	
	ini_set('display_errors', 'on');
	error_reporting(E_ALL);


	?>
	
	<div class="row">
		<div class="span12 events-cont">
			<h2>Upcoming Events</h2>
			<hr>
	<?php
	// Upcoming Events
		$args = array();
		$view = views_get_view('events');
			$view->set_items_per_page(3);
		echo $view->preview('block', $args);
		
		//print_r($ret);
	?>
		</div>
	</div>